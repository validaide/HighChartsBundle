<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;

class HorizontalAlignment
{
    public const ALIGN_LEFT   = "left";
    public const ALIGN_RIGHT  = "right";
    public const ALIGN_CENTER = "center";

    private string $align;

    public function __construct(string $align)
    {
        if (!in_array($align, $this->getAlignments())) {
            throw new InvalidArgumentException('This horizontal alignment is not allowed: ' . $align);
        }

        $this->align = $align;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->align;
    }

    /**
     * @return string[]
     */
    public function getAlignments(): array
    {
        return [
            self::ALIGN_LEFT,
            self::ALIGN_RIGHT,
            self::ALIGN_CENTER,
        ];
    }
}
