<?php

namespace Validaide\HighChartsBundle\Twig;

use Twig_Extension;
use Twig_SimpleFunction;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsExtension extends Twig_Extension
{
    private GraphHelper $graphHelper;

    private ImageRenderer $imageRenderer;

    public function __construct(GraphHelper $graphHelper, ImageRenderer $imageRenderer)
    {
        $this->graphHelper   = $graphHelper;
        $this->imageRenderer = $imageRenderer;
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new Twig_SimpleFunction('highcharts', fn(Graph $graph): string => $this->render($graph), ['is_safe' => ['html']]),
            new Twig_SimpleFunction('highcharts_static', fn(?Graph $graph, $options): string => $this->renderStatic($graph, $options), ['is_safe' => ['html']]),
            new Twig_SimpleFunction('highcharts_container', fn(Graph $graph): string => $this->renderHtml($graph), ['is_safe' => ['html']]),
            new Twig_SimpleFunction('highcharts_js', fn(Graph $graph): string => $this->renderJavascript($graph), ['is_safe' => ['html']]),
        ];
    }

    public function render(Graph $graph): string
    {
        return $this->graphHelper->render($graph);
    }

    public function renderStatic(Graph $graph = null, array $options = []): ?string
    {
        if ($graph === null) {
            return null;
        }

        return $this->imageRenderer->render($graph, $options);
    }

    public function renderHtml(Graph $graph): string
    {
        return $this->graphHelper->renderHtml($graph);
    }

    public function renderJavascript(Graph $graph): string
    {
        return $this->graphHelper->renderJavascript($graph);
    }

    public function getName(): string
    {
        return 'highcharts';
    }
}