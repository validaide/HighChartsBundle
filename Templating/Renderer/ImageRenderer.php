<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;

/**
 * Render an image of a given Graph
 *
 * This class will output a PNG file for a given Graph. It first converts the Graph to a temporary JSON file, which is then used as input for the highcharts-export-server.
 *
 * @author Daniel Attevelt <daniel.attevelt@validaide.com>
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class ImageRenderer
{
    const CMD_HIGHCHARTS_EXPORT_SERVER = 'highcharts-export-server';

    const HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH = 'width';
    const HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE = 'scale';
    const HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE  = 'type';

    const ERROR_HIGHCHARTS_RENDERED_NOT_FOUND = "An error occurred while running the HighCharts conversion tool. Did you install it? Code: %s";

    /**
     * @param Graph       $graph
     * @param array       $options
     *
     * @param string|null $outputPath
     *
     * @return string
     * @throws RenderingException
     */
    public function render(Graph $graph, $options = [], string $outputPath = null)
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
        if (is_null($outputPath)) {
            $outfile = $infile . "." . $options[self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE];
        } else {
            $outfile = $outputPath;
        }

        $optionParts = [];
        foreach ($options as $option => $value) {
            if (!is_null($value)) {
                $optionParts[] = "-$option $value";
            }
        }

        $command = sprintf('%s -infile %s -outfile %s %s', self::CMD_HIGHCHARTS_EXPORT_SERVER, $infile, $outfile, implode(" ", $optionParts));

        $process = new Process($command);
        $process->mustRun();

        return $outfile;
    }

    /**
     * @return array
     */
    public static function getAllowedHighChartsExportServerOptions(): array
    {
        return [
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE,
        ];
    }

    /**
     * @return array
     */
    public static function getDefaultHighChartsExportServerOptions(): array
    {
        return [
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_WIDTH => null,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE => null,
            self::HIGHCHARTS_EXPORT_SERVER_OPTION_TYPE  => 'png',
        ];
    }

    /**
     * @throws RenderingException
     */
    private function _sanityCheck(): void
    {
        $process = new Process(self::CMD_HIGHCHARTS_EXPORT_SERVER);
        $process->run();
        $code = $process->getExitCode();

        if ($code != 0) {
            throw new RenderingException(sprintf(self::ERROR_HIGHCHARTS_RENDERED_NOT_FOUND, $code));
        }
    }
}