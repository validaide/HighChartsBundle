<?php

namespace Validaide\HighChartsBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

class GraphHelper extends Helper
{
    /**
     * @var GraphRenderer
     */
    private $graphRender;

    /**
     * GraphHelper constructor.
     *
     * @param GraphRenderer $graphRenderer
     */
    public function __construct(
        GraphRenderer $graphRenderer
    )
    {
        $this->graphRender = $graphRenderer;
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
        $this->graphRender->render($graph);
    }

    /**
     * @param Graph $graph
     */
    public function renderHtml(Graph $graph)
    {
        $this->graphRender->renderHtml($graph);
    }

    /**
     * @param Graph $graph
     */
    public function renderJavascript(Graph $graph)
    {
        $this->graphRender->renderJavascript($graph);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'highcharts';
    }
}