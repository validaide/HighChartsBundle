<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;

class VerticalAlignment
{
    public const ALIGN_TOP    = "top";
    public const ALIGN_MIDDLE = "middle";
    public const ALIGN_BOTTOM = "bottom";

    private string $align;

    public function __construct(string $align)
    {
        if (!in_array($align, $this->getAlignments())) {
            throw new InvalidArgumentException('This vertical alignment is not allowed: ' . $align);
        }

        $this->align = $align;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->align;
    }

    /**
     * @return string[]
     */
    public function getAlignments(): array
    {
        return [
            self::ALIGN_TOP,
            self::ALIGN_MIDDLE,
            self::ALIGN_BOTTOM,
        ];
    }
}
