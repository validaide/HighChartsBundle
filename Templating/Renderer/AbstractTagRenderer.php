<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

class AbstractTagRenderer
{
    public function __construct(protected Formatter $formatter)
    {
    }
}