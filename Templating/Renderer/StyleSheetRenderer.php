<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class StyleSheetRenderer extends AbstractTagRenderer
{
    public function render(string $stylesheet, string $value): string
    {
        return $this->formatter->renderCode($stylesheet . ':' . $this->formatter->renderSeparator() . $value, true);
    }
}