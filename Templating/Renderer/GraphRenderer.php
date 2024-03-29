<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

class GraphRenderer
{
    protected Formatter          $formatter;
    protected TagRenderer        $tagRenderer;
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
        return $this->renderHtml($graph) .
            $this->formatter->renderNewline() .
            $this->renderJavascript($graph);
    }

    public function renderHtml(Graph $graph): string
    {
        $renderOptions = ['id' => $graph->getHtmlId()];
        if (!is_null($graph->getHeight()) || !is_null($graph->getWidth())) {
            $renderOptions['style'] = $this->styleSheetRenderer->render('width', $graph->getWidth()) . $this->styleSheetRenderer->render('height', $graph->getHeight());
        }
        
        if (!is_null($graph->getCssClass())) {
            $renderOptions['class'] = $graph->getCssClass();
        }

        return $this->tagRenderer->render('div', null, $renderOptions);
    }

    public function renderJavascript(Graph $graph): string
    {
        $javascriptVariable = $this->javascriptRenderer->renderVariable('graph_' . $graph->getJsChartId(), $graph->toJson());

        return $this->tagRenderer->render('script', $javascriptVariable, ['type' => "text/javascript"]);
    }
}