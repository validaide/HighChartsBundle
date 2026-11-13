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

    // Enough for the whole output of a normal failure, while a runaway output cannot use up the memory
    final public const int ERROR_OUTPUT_MAX_BYTES = 20000;

    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH           = 'width';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE           = 'scale';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE            = 'type';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_LOG_LEVEL       = 'logLevel';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_LOG_DESTINATION = 'logDest';
    final public const HIGHCHARTS_EXPORT_SERVER_OPTION_WORKERS         = 'workers';

    final public const ERROR_HIGHCHARTS_RENDERED_NOT_FOUND = "An error occurred while running the HighCharts conversion tool. Did you install it? Code: %s";

    public function __construct(private readonly int $timeoutSeconds = self::TIMEOUT_SECONDS)
    {
    }

    /**
     * @throws RenderingException
     */
    public function render(Graph $graph, array $options = [], ?string $outputPath = null): string
    {
        $this->_sanityCheck();

        // Resolve our HighCharts Export Server options
        $optionsResolver = new OptionsResolver();
        $optionsResolver->setDefaults(self::getDefaultHighChartsExportServerOptions());
        $options = $optionsResolver->resolve($options);

        // Define the temporary file path for the JSON content
        $prefix = "highcharts";
        $infile = tempnam("/tmp/", $prefix);

        // Write the JSON to the JSON file
        file_put_contents($infile, $graph->toJson());

        // Define the output PNG file path
        $outfile = is_null($outputPath) ? $infile . "." . $options[self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE] : $outputPath;

        $optionArguments = [];
        foreach ($options as $option => $value) {
            if (!is_null($value)) {
                array_push($optionArguments, "-$option", $value);
            }
        }

        // this is required by the upgrade to highcharts-export-server v3.1.1
        // which is not creating the missing folders automatically anymore :(
        $dirPath = dirname($outfile);
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0775, true);
        }

        $loadConfigPath = getenv(self::ENV_HIGHCHARTS_LOADCONFIG);

        $loadConfigArguments = [];
        if (!empty($loadConfigPath)) {
            $loadConfigArguments = ['--loadConfig', $loadConfigPath];
        }

        $outputFile = tempnam("/tmp/", $prefix . "-output");
        $process    = $this->createExportServerProcess($outputFile, ['-infile', $infile, '-outfile', $outfile, ...$loadConfigArguments, ...$optionArguments]);

        try {
            $process->mustRun();
        } catch (ProcessFailedException|ProcessSignaledException) {
            throw new ExportServerFailedException($process, $this->readEndOfOutput($outputFile));
        } finally {
            unlink($outputFile);
        }

        return $outfile;
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

    /**
     * @throws RenderingException
     */
    private function _sanityCheck(): void
    {
        $process = $this->createExportServerProcess('/dev/null');
        $process->run();
        $code = $process->getExitCode();

        if ($code != 0) {
            throw new RenderingException(sprintf(self::ERROR_HIGHCHARTS_RENDERED_NOT_FOUND, $code));
        }
    }

    private function createExportServerProcess(string $outputFile, array $arguments = []): Process
    {
        // Unlike a pipe to PHP, the file stays writable when PHP is gone, so the export server can still log and close its browser
        $process = new Process([self::CMD_SHELL, '-c', 'exec "$@" > "$0" 2>&1', $outputFile, self::CMD_TIMEOUT, '-k', self::KILL_AFTER_SECONDS, $this->timeoutSeconds, self::CMD_HIGHCHARTS_EXPORT_SERVER, ...$arguments]);

        // A fallback in case timeout itself does not end
        $process->setTimeout($this->timeoutSeconds + self::KILL_AFTER_SECONDS + self::FALLBACK_MARGIN_SECONDS);

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
