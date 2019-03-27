<?php

namespace Validaide\HighChartsBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
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
        $functions = [];
        foreach ($this->getMapping() as $name => $method) {
            $functions[] = new \Twig_SimpleFunction($name, [$this, $method], ['is_safe' => ['html']]);
        }

        return $functions;
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function render(Graph $graph)
    {
        return $this->graphRender->render($graph);
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function renderHtml(Graph $graph)
    {
        return $this->graphRender->renderHtml($graph);
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function renderJavascript(Graph $graph)
    {
        return $this->graphRender->renderJavascript($graph);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'highcharts';
    }

    /**
     * @return string[]
     */
    private function getMapping()
    {
        return [
            'highcharts'           => 'render',
            'highcharts_container' => 'renderHtml',
            'highcharts_js'        => 'renderJavascript',
        ];
    }
}