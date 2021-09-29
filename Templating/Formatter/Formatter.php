<?php

namespace Validaide\HighChartsBundle\Templating\Formatter;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Formatter
{
    /**
     * @param $argument
     *
     * @return string|bool
     */
    public function renderEscape($argument)
    {
        return json_encode($argument, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function renderCode(string $code, bool $semicolon = true): string
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

    /**
     * @param $code
     */
    public function renderJQuery($code): string
    {
        return $this->renderNewline() . '$(function () {' . $this->renderNewline() .
            $code . $this->renderNewline() .
            '});' . $this->renderNewline();
    }
}