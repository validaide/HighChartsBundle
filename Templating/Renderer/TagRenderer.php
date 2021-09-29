<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class TagRenderer extends AbstractTagRenderer
{
    /**
     * @param string|null $code
     * @param string[]    $attributes
     *
     */
    public function render(string $name, $code = null, array $attributes = []): string
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