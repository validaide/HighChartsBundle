<?php

namespace Validaide\HighChartsBundle\Twig;

use Validaide\HighChartsBundle\Graph;

class HighChartsExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('highcharts', [$this, 'render'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_container', [$this, 'renderHtml'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_js', [$this, 'renderJavascript'], ['is_safe' => ['html']]),
        ];
    }

    public function render(Graph $graph)
    {

    }

    public function renderHtml(Graph $graph)
    {

    }

    public function renderJavascript(Graph $graph)
    {

    }

    public function getName()
    {
        return 'highcharts';
    }
}