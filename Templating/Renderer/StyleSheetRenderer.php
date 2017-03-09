<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

class StyleSheetRenderer extends AbstractTagRenderer
{
    /**
     * @param string $stylesheet
     * @param string $value
     *
     * @return string
     */
    public function render($stylesheet, $value)
    {
        return $this->formatter->renderCode($stylesheet . ':' . $this->formatter->renderSeparator() . $value, true);
    }
}