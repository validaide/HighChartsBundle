<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

class StyleSheetRenderer extends AbstractTagRenderer
{
    public function render(string $stylesheet, ?string $value = null): ?string
    {
        if (is_null($value)) {
            return null;
        }
        
        return $this->formatter->renderCode($stylesheet . ':' . $this->formatter->renderSeparator() . $value, true);
    }
}