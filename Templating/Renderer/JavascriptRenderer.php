<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class JavascriptRenderer extends AbstractTagRenderer
{
    /**
     * @param $variable
     * @param $assignment
     */
    public function renderVariable($variable, $assignment): string
    {
        return 'var ' . $variable . ' = ' . $assignment . ';';
    }
}