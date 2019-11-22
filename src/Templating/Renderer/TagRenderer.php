<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class TagRenderer extends AbstractTagRenderer
{
    /**
     * @param string      $name
     * @param string|null $code
     * @param string[]    $attributes
     *
     * @return string
     */
    public function render($name, $code = null, array $attributes = [])
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