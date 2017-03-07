<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Graph;

class GraphRenderer
{
    public function render(Graph $graph)
    {
        return $this->renderHtml($graph).$this->renderJavascript($graph);
    }

    public function renderHtml(Graph $graph)
    {

    }

    public function renderJavascript(Graph $graph)
    {

    }
}