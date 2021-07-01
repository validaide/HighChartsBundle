<?php

namespace Validaide\HighChartsBundle\Templating\Formatter;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Formatter
{
    public function renderEscape(string $argument): string
    {
        return json_encode($argument, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function renderCode(string $code, $semicolon = true): string
    {
        if ($semicolon) {
            $code .= ';';
        }

        return $code;
    }

    public function renderSeparator(): string
    {
        return '';
    }

    public function renderNewline(): string
    {
        return "\n";
    }

    public function renderJQuery(string $code): string
    {
        return $this->renderNewline() . '$(function () {' . $this->renderNewline() .
            $code . $this->renderNewline() .
            '});' . $this->renderNewline();
    }
}