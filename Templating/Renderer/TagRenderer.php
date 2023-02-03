<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

class TagRenderer extends AbstractTagRenderer
{
    public function render(string $name, ?string $code = null, array $attributes = []): string
    {
        $tagAttributes = [];
        foreach ($attributes as $attribute => $value) {
            $tagAttributes[] = $attribute . '=' . $this->formatter->renderEscape($value);
        }

        if (!empty($tagAttributes)) {
            array_unshift($tagAttributes, null);
        }

        return '<' . $name . implode(' ', $tagAttributes) . '>' .
            $code .
            '</' . $name . '>';
    }
}