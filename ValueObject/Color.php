<?php

namespace Validaide\HighChartsBundle\ValueObject;

use Stringable;

class Color implements Stringable
{
    public function __construct(private readonly string $color)
    {
    }

    public function __toString(): string
    {
        return $this->color;
    }
}
