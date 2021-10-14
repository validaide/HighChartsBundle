<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class GraphRenderer
{
    protected Formatter $formatter;
    protected TagRenderer $tagRenderer;
    protected StyleSheetRenderer $styleSheetRenderer;
    protected JavascriptRenderer $javascriptRenderer;

    public function __construct()
    {
        $this->formatter          = new Formatter();
        $this->tagRenderer        = new TagRenderer($this->formatter);
        $this->styleSheetRenderer = new StyleSheetRenderer($this->formatter);
        $this->javascriptRenderer = new JavascriptRenderer($this->formatter);
    }

    public function render(Graph $graph): string
    {
        return $this->renderHtml($graph) . $this->formatter->renderNewline() .
            $this->renderJavascript($graph);
    }

    public function renderHtml(Graph $graph): string
    {
        $styleSheet = $this->styleSheetRenderer->render('width', $graph->getWidth()) . $this->styleSheetRenderer->render('height', $graph->getHeight());

        return $this->tagRenderer->render('div', null, ['id' => $graph->getHtmlId(), 'style' => $styleSheet]);
    }

    public function renderJavascript(Graph $graph): string
    {
        $json              = $graph->toJson();
        $highChartInitCode = 'Highcharts.chart(' . $this->formatter->renderEscape($graph->getHtmlId()) . ',' . $this->formatter->renderNewline() . $json . $this->formatter->renderNewline() . ')';
        $code              = $this->javascriptRenderer->renderVariable($graph->getJsChartId(), $highChartInitCode);
        $jquery            = $this->formatter->renderJQuery($code);

//        return $this->tagRenderer->render('script', null, ['src' => 'https://code.highcharts.com/highcharts.js']) .$this->formatter->renderNewline() .
//            $this->tagRenderer->render('script', $jquery, ['type' => "text/javascript"]);
        return $this->tagRenderer->render('script', $jquery, ['type' => "text/javascript"]);
    }
}