<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class JavascriptRenderer extends AbstractTagRenderer
{
    public function renderVariable(string $variable, string $assignment): string
    {
        return 'var ' . $variable . ' = ' . $assignment . ';';
    }
}