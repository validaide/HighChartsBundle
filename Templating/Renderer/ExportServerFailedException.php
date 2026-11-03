<?php

namespace Validaide\HighChartsBundle\Templating\Renderer;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ExportServerFailedException extends ProcessFailedException
{
    public function __construct(Process $process, string $output)
    {
        parent::__construct($process);

        $this->message .= sprintf("\n\nOutput:\n================\n%s", $output);
    }
}
