<?php

namespace Validaide\HighChartsBundle\Twig;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsExtension extends \Twig_Extension
{
    /**
     * @var GraphHelper
     */
    private $graphHelper;

    /**
     * @var ImageRenderer
     */
    private $imageRenderer;

    /**
     * @param GraphHelper   $graphHelper
     * @param ImageRenderer $imageRenderer
     */
    public function __construct(GraphHelper $graphHelper, ImageRenderer $imageRenderer)
    {
        $this->graphHelper   = $graphHelper;
        $this->imageRenderer = $imageRenderer;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('highcharts', [$this, 'render'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_static', [$this, 'renderStatic'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_container', [$this, 'renderHtml'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('highcharts_js', [$this, 'renderJavascript'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function render(Graph $graph)
    {
        return $this->graphHelper->render($graph);
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function renderStatic(Graph $graph = null, $options = [])
    {
        if (!$graph) {
            return null;
        }

        return $this->imageRenderer->render($graph, $options);
    }

    /**
     * @param Graph $graph
     *
     * @return string
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