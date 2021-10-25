<?php

namespace Validaide\HighChartsBundle\Templating\Helper;

use Twig_SimpleFunction;
use Symfony\Component\Templating\Helper\Helper;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class GraphHelper extends Helper
{
    private GraphRenderer $graphRender;

    /**
     * GraphHelper constructor.
     */
    public function __construct(
        GraphRenderer $graphRenderer
    )
    {
        $this->graphRender = $graphRenderer;
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions(): array
    {
        $functions = [];
        foreach ($this->getMapping() as $name => $method) {
            $functions[] = new Twig_SimpleFunction($name, [$this, $method], ['is_safe' => ['html']]);
        }

        return $functions;
    }

    public function render(Graph $graph): string
    {
        return $this->graphRender->render($graph);
    }

    public function renderHtml(Graph $graph): string
    {
        return $this->graphRender->renderHtml($graph);
    }

    public function renderJavascript(Graph $graph): string
    {
        return $this->graphRender->renderJavascript($graph);
    }

    public function getName(): string
    {
        return 'highcharts';
    }

    /**
     * @return string[]
     */
    private function getMapping(): array
    {
        return [
            'highcharts'           => 'render',
            'highcharts_container' => 'renderHtml',
            'highcharts_js'        => 'renderJavascript',
        ];
    }
}