<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Validaide\HighChartsBundle\Templating\Formatter\Formatter;

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