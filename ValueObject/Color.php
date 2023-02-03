<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;

class Color
{
    private string $color;

    public function __construct(string $color)
    {
        if (is_null($color)) {
            throw new InvalidArgumentException('NULL objects are not allowed');
        }

        $this->color = $color;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->color;
    }
}
