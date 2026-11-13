<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Exception\ProcessSignaledException;
use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;

/**
 * Render an image of a given Graph
 *
 * This class will output a PNG file for a given Graph. It first converts the Graph to a temporary JSON file, which is then used as input for the highcharts-export-server.
 */
class ImageRenderer
{
    final public const string ENV_HIGHCHARTS_LOADCONFIG = 'HIGHCHARTS_LOADCONFIG';
    final public const CMD_HIGHCHARTS_EXPORT_SERVER = 'highcharts-export-server';
    final public const CMD_TIMEOUT                  = 'timeout';
    final public const CMD_SHELL                    = 'sh';

    final public const int TIMEOUT_SECONDS         = 60;
    final public const int KILL_AFTER_SECONDS      = 10;
    final public const int FALLBACK_MARGIN_SECONDS = 5;

    // The exit code of timeout when it stopped the export server
    final public const int EXIT_CODE_TIMED_OUT = 124;

    final public const int BATCH_TIMEOUT_SECONDS                 = 120;
    final public const int BATCH_PAGES                           = 4;
    final public const int BATCH_SCREENSHOT_TIMEOUT_MILLISECONDS = 4000;

    // Enough for the whole output of a normal failure, while a runaway output cannot use up the memory
    final public const int ERROR_OUTPUT_MAX_BYTES = 20000;

    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH           = 'width';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE           = 'scale';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE            = 'type';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_LOG_LEVEL       = 'logLevel';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_LOG_DESTINATION = 'logDest';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_WORKERS         = 'workers';

    public function __construct(
        private readonly int $timeoutSeconds = self::TIMEOUT_SECONDS,
        private readonly int $batchTimeoutSeconds = self::BATCH_TIMEOUT_SECONDS,
    )
    {
    }

    /**
     * @throws RenderingException          When the export server ends with an error
     * @throws ExportServerFailedException When the export server has to be stopped
     */
    public function render(Graph $graph, array $options = [], ?string $outputPath = null): string
    {
        $options = $this->resolveOptions($options);

        // Define the temporary file path for the JSON content
        $prefix = "highcharts";
        $infile = tempnam("/tmp/", $prefix);

        // Write the JSON to the JSON file
        file_put_contents($infile, $graph->toJson());

        // Define the output PNG file path
        $outfile = is_null($outputPath) ? $infile . "." . $options[self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE] : $outputPath;

        // this is required by the upgrade to highcharts-export-server v3.1.1
        // which is not creating the missing folders automatically anymore :(
        $this->createDirectory(dirname($outfile));

        $loadConfigPath = getenv(self::ENV_HIGHCHARTS_LOADCONFIG);

        $loadConfigArguments = [];
        if (!empty($loadConfigPath)) {
            $loadConfigArguments = ['--loadConfig', $loadConfigPath];
        }

        $outputFile = tempnam("/tmp/", $prefix . "-output");
        $process    = $this->createExportServerProcess($outputFile, $this->timeoutSeconds, ['-infile', $infile, '-outfile', $outfile, ...$loadConfigArguments, ...$this->getOptionArguments($options)]);

        try {
            $process->mustRun();
        } catch (ProcessFailedException|ProcessSignaledException) {
            $exception = new ExportServerFailedException($process, $this->readEndOfOutput($outputFile));

            if ($this->hasBeenStopped($process)) {
                throw $exception;
            }

            throw new RenderingException($exception->getMessage(), 0, $exception);
        } finally {
            unlink($outputFile);
        }

        return $outfile;
    }

    /**
     * Renders the graphs in one export server call
     *
     * @param array<string, Graph> $graphs The graphs by their output path
     *
     * @return string[] The output paths that got an image
     *
     * @throws ExportServerFailedException When the export server has to be stopped
     */
    public function renderBatch(array $graphs, array $options = []): array
    {
        if (empty($graphs)) {
            return [];
        }

        $options   = $this->resolveOptions($options);
        $directory = sprintf('/tmp/highcharts-batch-%s', bin2hex(random_bytes(8)));
        mkdir($directory, 0700);

        try {
            $pairs  = [];
            $images = [];
            foreach (array_keys($graphs) as $index => $outputPath) {
                $infile  = sprintf('%s/%d.json', $directory, $index);
                $outfile = sprintf('%s/%d.%s', $directory, $index, $options[self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE]);
                file_put_contents($infile, $graphs[$outputPath]->toJson());

                $pairs[]             = $infile . '=' . $outfile;
                $images[$outputPath] = $outfile;
            }

            $configFile = $directory . '/config.json';
            file_put_contents($configFile, json_encode($this->getBatchConfig(count($graphs))));

            $outputFile = $directory . '/output';
            $process    = $this->createExportServerProcess($outputFile, $this->batchTimeoutSeconds, [
                '--batch', implode(';', $pairs),
                '--loadConfig', $configFile,
                ...$this->getOptionArguments($options),
                // Without --minWorkers on the command line, batch mode replaces the page count with its own defaults
                '--minWorkers', self::BATCH_PAGES,
                '--maxWorkers', self::BATCH_PAGES,
            ]);

            try {
                $process->mustRun();
            } catch (ProcessFailedException|ProcessSignaledException) {
                if ($this->hasBeenStopped($process)) {
                    throw new ExportServerFailedException($process, $this->readEndOfOutput($outputFile));
                }

                // An export server that ends with an error can leave blank images of the charts it was still rendering
                return [];
            }

            // A failed chart can also end the call without an error, so only the images tell which graphs were rendered
            return $this->moveImages($images);
        } finally {
            $this->removeDirectory($directory);
        }
    }

    public static function getAllowedHighChartsExportServerOptions(): array
    {
        return [
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE,
        ];
    }

    public static function getDefaultHighChartsExportServerOptions(): array
    {
        return [
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH           => null,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE           => null,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE            => 'png',
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_LOG_LEVEL       => null,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_LOG_DESTINATION => null,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_WORKERS         => null,
        ];
    }

    private function resolveOptions(array $options): array
    {
        // Resolve our HighCharts Export Server options
        $optionsResolver = new OptionsResolver();
        $optionsResolver->setDefaults(self::getDefaultHighChartsExportServerOptions());

        return $optionsResolver->resolve($options);
    }

    private function getOptionArguments(array $options): array
    {
        $optionArguments = [];
        foreach ($options as $option => $value) {
            if (!is_null($value)) {
                array_push($optionArguments, "-$option", $value);
            }
        }

        return $optionArguments;
    }

    /**
     * The export server reads only one config file, so the batch limits are added to the one of HIGHCHARTS_LOADCONFIG
     */
    private function getBatchConfig(int $graphCount): array
    {
        $loadConfigPath = getenv(self::ENV_HIGHCHARTS_LOADCONFIG);
        $config         = !empty($loadConfigPath) && is_readable($loadConfigPath) ? json_decode((string)file_get_contents($loadConfigPath), true) : [];

        return array_replace_recursive(is_array($config) ? $config : [], [
            // Every chart may wait for a free page, as long as the whole call may take
            'pool'   => ['acquireTimeout' => $this->batchTimeoutSeconds * 1000, 'queueLimit' => $graphCount],
            'export' => ['rasterizationTimeout' => self::BATCH_SCREENSHOT_TIMEOUT_MILLISECONDS],
        ]);
    }

    /**
     * @param array<string, string> $images The image files by their output path
     *
     * @return string[] The output paths that got an image
     */
    private function moveImages(array $images): array
    {
        $outputPaths = [];
        foreach ($images as $outputPath => $image) {
            if (!is_file($image) || filesize($image) === 0) {
                continue;
            }

            $this->createDirectory(dirname($outputPath));

            if (rename($image, $outputPath)) {
                $outputPaths[] = $outputPath;
            }
        }

        return $outputPaths;
    }

    private function createDirectory(string $directory): void
    {
        if (!is_dir($directory)) {
            mkdir($directory, 0775, true);
        }
    }

    private function removeDirectory(string $directory): void
    {
        foreach (glob($directory . '/*') ?: [] as $file) {
            unlink($file);
        }

        rmdir($directory);
    }

    private function hasBeenStopped(Process $process): bool
    {
        return $process->getExitCode() === self::EXIT_CODE_TIMED_OUT || $process->hasBeenSignaled();
    }

    private function createExportServerProcess(string $outputFile, int $timeoutSeconds, array $arguments): Process
    {
        // Unlike a pipe to PHP, the file stays writable when PHP is gone, so the export server can still log and close its browser
        $process = new Process([self::CMD_SHELL, '-c', 'exec "$@" > "$0" 2>&1', $outputFile, self::CMD_TIMEOUT, '-k', self::KILL_AFTER_SECONDS, $timeoutSeconds, self::CMD_HIGHCHARTS_EXPORT_SERVER, ...$arguments]);

        // A fallback in case timeout itself does not end
        $process->setTimeout($timeoutSeconds + self::KILL_AFTER_SECONDS + self::FALLBACK_MARGIN_SECONDS);

        // The output is read from the file instead
        $process->disableOutput();

        return $process;
    }

    private function readEndOfOutput(string $outputFile): string
    {
        $handle = fopen($outputFile, 'r');
        $size   = fstat($handle)['size'];

        if ($size <= self::ERROR_OUTPUT_MAX_BYTES) {
            $output = stream_get_contents($handle);
        } else {
            fseek($handle, -self::ERROR_OUTPUT_MAX_BYTES, SEEK_END);
            // Starts at the next full line
            fgets($handle);
            $output = sprintf("[Only the last part of %d bytes of output]\n%s", $size, stream_get_contents($handle));
        }

        fclose($handle);

        return (string)$output;
    }
}
