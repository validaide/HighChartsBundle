<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;

/**
 * Class ImageRenderer
 *
 * @author Daniel Attevelt <daniel.attevelt@validaide.com>
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class ImageRenderer
{
    const CMD_HIGHCHARTS_EXPORT_SERVER = 'highcharts-export-server';

    const ERROR_HIGHCHARTS_RENDERED_NOT_FOUND = "An error occurred while running the HighCharts conversion tool. Did you install it? Code: %s";

    const ALLOWED_OPTIONS = ['width', 'scale'];

    /**
     * @param Graph $graph
     * @param array $options
     *
     * @return string
     */
    public function render(Graph $graph, $options = [])
    {
        $this->_sanityCheck();

        $json = $graph->toJson();

        $prefix  = "highcharts";
        $infile  = tempnam("/tmp/", $prefix);
        $outfile = $infile . ".png";

        file_put_contents($infile, $json);

        $optionString = "";
        foreach (self::ALLOWED_OPTIONS as $allowedOption) {
            if (array_key_exists($allowedOption, $options)) {
                $optionString .= "-$allowedOption {$options[$allowedOption]}";
            }
        }

        $command = sprintf('%s -infile %s -outfile %s %s', self::CMD_HIGHCHARTS_EXPORT_SERVER, $infile, $outfile, $optionString);

        $process = new Process($command);
        $process->mustRun();

        return $outfile;
    }

    /**
     * @throws \Exception
     */
    private function _sanityCheck()
    {
        $process = new Process(self::CMD_HIGHCHARTS_EXPORT_SERVER);
        $process->run();
        $code = $process->getExitCode();

        if ($code != 0) {
            throw new \Exception(sprintf(self::ERROR_HIGHCHARTS_RENDERED_NOT_FOUND, $code));
        }
    }
}