<?php


namespace Validaide\HighChartsBundle\Templating\Renderer;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;

class ImageRenderer
{
    /**
     * @param Graph $graph
     *
     * @return mixed
     */
    public function render(Graph $graph)
    {
        $json = $graph->toJson();

//        $payload = [
//            'async'  => true,
//            'asyncRendering' => false,
//            'infile' => $json,
//            'type' => 'image/png',
//            'filename' => $filename,
//            'width' => 400
//        ];

        $prefix  = "highcharts";
        $infile  = tempnam (  "/tmp/" ,  $prefix );
        $outfile = $infile.".png"; 

        file_put_contents($infile, $json);
        
        $options = [
            '-infile'  => $infile,
            '-outfile' => $outfile 
        ];
        
        $command = sprintf('highcharts-export-server -infile %s -outfile %s', $infile, $outfile);

        $process = new Process($command);
        $process->mustRun();
        return "<img src='".$outfile."'/>'";
    }
}