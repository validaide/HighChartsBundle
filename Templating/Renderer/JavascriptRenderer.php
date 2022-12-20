<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

class JavascriptRenderer extends AbstractTagRenderer
{
    public function renderVariable(string $variable, string $assignment): string
    {
        return 'var ' . $variable . ' = ' . $assignment . ';';
    }
}