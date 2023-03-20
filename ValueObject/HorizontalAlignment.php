<?php

namespace Validaide\HighChartsBundle\ValueObject;

use Stringable;
use InvalidArgumentException;

class HorizontalAlignment implements Stringable
{
    final public const ALIGN_LEFT   = "left";
    final public const ALIGN_RIGHT  = "right";
    final public const ALIGN_CENTER = "center";

    private readonly string $align;

    public function __construct(string $align)
    {
        if (!in_array($align, $this->getAlignments())) {
            throw new InvalidArgumentException('This horizontal alignment is not allowed: ' . $align);
        }

        $this->align = $align;
    }

    public function __toString(): string
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