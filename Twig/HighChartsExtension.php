<?php

namespace Validaide\HighChartsBundle\Twig;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;

class HighChartsExtension extends \Twig_Extension
{
    /**
     * @var GraphHelper
     */
    private $graphHelper;

    /**
     * @param GraphHelper $graphHelper
     */
    public function __construct(GraphHelper $graphHelper)
    {
        $this->graphHelper = $graphHelper;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('highcharts', [$this, 'render'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_container', [$this, 'renderHtml'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_js', [$this, 'renderJavascript'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param Graph $graph
     */
    public function render(Graph $graph)
    {
        return $this->graphHelper->render($graph);
    }

    /**
     * @param Graph $graph
     */
    public function renderHtml(Graph $graph)
    {
        return $this->graphHelper->renderHtml($graph);
    }

    /**
     * @param Graph $graph
     */
    public function renderJavascript(Graph $graph)
    {
        return $this->graphHelper->renderJavascript($graph);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'highcharts';
    }
}