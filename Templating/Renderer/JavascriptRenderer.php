<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

class JavascriptRenderer extends AbstractTagRenderer
{
    public function renderVariable($variable, $assignment)
    {
        return 'var ' . $variable . ' = ' . $assignment . ';';
    }
}