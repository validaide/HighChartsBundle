<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class AbstractTagRenderer
{
    protected Formatter $formatter;

    /**
     * AbstractTagRenderer constructor.
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }
}