<?php

namespace Validaide\HighChartsBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsExtension extends AbstractExtension
{
    private GraphHelper   $graphHelper;
    private ImageRenderer $imageRenderer;

    public function __construct(GraphHelper $graphHelper, ImageRenderer $imageRenderer)
    {
        $this->graphHelper   = $graphHelper;
        $this->imageRenderer = $imageRenderer;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('highcharts', [$this, 'render'], ['is_safe' => ['html']]),
            new TwigFunction('highcharts_static', [$this, 'renderStatic'], ['is_safe' => ['html']]),
            new TwigFunction('highcharts_container', [$this, 'renderHtml'], ['is_safe' => ['html']]),
            new TwigFunction('highcharts_js', [$this, 'renderJavascript'], ['is_safe' => ['html']]),
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