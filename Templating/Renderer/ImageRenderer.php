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
     * @var string
     */
    private $binary;

    /**
     * ImageRenderer constructor.
     *
     * @param $binary
     */
    public function __construct($binary)
    {
        $this->binary = 'export PATH=$PATH:/usr/local/bin;'. $binary;
    }

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
        $infile  = tempnam (  "/tmp/" ,  $prefix );
        $outfile = $infile.".png"; 

        file_put_contents($infile, $json);

        $optionString = "";
        foreach (self::ALLOWED_OPTIONS as $allowedOption) {
            if (array_key_exists($allowedOption, $options)) {
                $optionString .= "-$allowedOption {$options[$allowedOption]}";
            }
        }

        $command = sprintf('%s -infile %s -outfile %s %s', $this->binary, $infile, $outfile, $optionString);

        $process = new Process($command);
        $process->mustRun();
        return $outfile;
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function _sanityCheck()
    {
        $command = $this->binary;
        $process = new Process($command);
        $process->run();
        $code = $process->getExitCode();

        if ($code != 0) {
            throw new \Exception("An error occured while running the highcharts conversion tool. Did you install it? Code: $code");
        }
    }
}