<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

class StyleSheetRenderer extends AbstractTagRenderer
{
    public function render(string $stylesheet, string $value): string
    {
        return $this->formatter->renderCode($stylesheet . ':' . $this->formatter->renderSeparator() . $value, true);
    }
}