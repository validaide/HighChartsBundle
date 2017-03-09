<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

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