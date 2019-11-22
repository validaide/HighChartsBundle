<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Serializer\Normalizer\GraphNormalizer;
use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class GraphRenderer
{
    /** @var Serializer */
    private $serializer;
    /** @var Formatter */
    protected $formatter;
    /** @var TagRenderer */
    protected $tagRenderer;
    /** @var StyleSheetRenderer */
    protected $styleSheetRenderer;
    /** @var JavascriptRenderer */
    protected $javascriptRenderer;

    /**
     */
    public function __construct()
    {
        $this->serializer         = new Serializer([new GraphNormalizer()],[new JsonEncoder()]);
        $this->formatter          = new Formatter();
        $this->tagRenderer        = new TagRenderer($this->formatter);
        $this->styleSheetRenderer = new StyleSheetRenderer($this->formatter);
        $this->javascriptRenderer = new JavascriptRenderer($this->formatter);
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function render(Graph $graph)
    {
        return $this->renderHtml($graph) . $this->formatter->renderNewline() .
            $this->renderJavascript($graph);
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function renderHtml(Graph $graph)
    {
        $styleSheet = $this->styleSheetRenderer->render('width', $graph->getWidth()) . $this->styleSheetRenderer->render('height', $graph->getHeight());

        return $this->tagRenderer->render('div', null, ['id' => $graph->getHtmlId(), 'style' => $styleSheet]);
    }

    /**
     * @param Graph $graph
     *
     * @return string
     */
    public function renderJavascript(Graph $graph)
    {
        $json              = $this->serializer->serialize($graph, 'json', [JsonEncode::OPTIONS => JSON_PRETTY_PRINT]);
        $highChartInitCode = 'Highcharts.chart(' . $this->formatter->renderEscape($graph->getHtmlId()) . ',' . $this->formatter->renderNewline() . $json . $this->formatter->renderNewline() . ')';
        $code              = $this->javascriptRenderer->renderVariable($graph->getJsChartId(), $highChartInitCode);
        $jquery            = $this->formatter->renderJQuery($code);

//        return $this->tagRenderer->render('script', null, ['src' => 'https://code.highcharts.com/highcharts.js']) .$this->formatter->renderNewline() .
//            $this->tagRenderer->render('script', $jquery, ['type' => "text/javascript"]);
        return $this->tagRenderer->render('script', $jquery, ['type' => "text/javascript"]);
    }
}