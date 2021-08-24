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
     *
     * @return string
     */
    public function renderVariable($variable, $assignment)
    {
        return 'var ' . $variable . ' = ' . $assignment . ';';
    }
}