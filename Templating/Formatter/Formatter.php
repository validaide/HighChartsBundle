<?php

namespace Validaide\HighChartsBundle\Templating\Formatter;

class Formatter
{
    /**
     * @param $argument
     *
     * @return string
     */
    public function renderEscape($argument)
    {
        return json_encode($argument, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $code
     * @param bool   $semicolon
     *
     * @return string
     */
    public function renderCode($code, $semicolon = true)
    {
        if ($semicolon) {
            $code .= ';';
        }

        return $code;
    }

    /**
     * @return string
     */
    public function renderSeparator()
    {
        return '';
    }

    /**
     * @return string
     */
    public function renderNewline()
    {
        return "\n";
    }

    /**
     * @param $code
     *
     * @return string
     */
    public function renderJQuery($code)
    {
        return $this->renderNewline() . '$(function () {' . $this->renderNewline() .
            $code . $this->renderNewline() .
            '});' . $this->renderNewline();
    }
}