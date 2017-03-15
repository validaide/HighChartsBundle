<?php

namespace Validaide\HighChartsBundle\ValueObject;

/**
 * Color
 */
class Color
{
    /**
     * @var string
     */
    private $color;

    /**
     * Color constructor.
     *
     * @param string $color
     */
    public function __construct($color)
    {
        if (is_null($color)) {
            throw new \InvalidArgumentException('NULL objects are not allowed');
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
