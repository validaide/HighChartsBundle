<?php


namespace Validaide\HighChartsBundle\Templating\Renderer;

use PHPUnit\Runner\Exception;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;

class ImageRenderer
{
    const ALLOWED_OPTIONS = ['width', 'scale'];

    /**
     * ImageRenderer constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        // Sanity check before this logic can be used
        $command = 'highcharts-export-server';
        $process = new Process($command);
        $process->run();
        $code = $process->getExitCode();

        if ($code != 0) {
            throw new \Exception("An error occured while running the highcharts conversion tool. Did you install it? Code: $code");
        }
    }

    /**
     * @param Graph $graph
     * @param array $options
     *
     * @return string
     */
    public function render(Graph $graph, $options = [])
    {
        $json = $graph->toJson();

        $prefix  = "highcharts";
        $infile  = tempnam (  "/tmp/" ,  $prefix );
        $outfile = $infile.".png"; 

        file_put_contents($infile, $json);

        $optionString = "";
        foreach (self::ALLOWED_OPTIONS as $allowedOption) {
            if (array_key_exists($allowedOption, $options)) {
                $optionString .= "-$allowedOption {$options[$allowedOption]}";
            }
        }

        $command = sprintf('highcharts-export-server -infile %s -outfile %s %s', $infile, $outfile, $optionString);

        $process = new Process($command);
        $process->mustRun();
        return "<img src='".$outfile."'/>'";
    }
}