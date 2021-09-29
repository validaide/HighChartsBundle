<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;
/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Color
{
    private string $color;

    /**
     * Color constructor.
     */
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
