<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class AbstractTagRenderer
{
    /** @var Formatter  */
    protected $formatter;

    /**
     * AbstractTagRenderer constructor.
     *
     * @param Formatter $formatter
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }
}