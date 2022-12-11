<?php

namespace Validaide\HighChartsBundle\ValueObject;

use Stringable;
use InvalidArgumentException;

class VerticalAlignment implements Stringable
{
    final public const ALIGN_TOP    = "top";
    final public const ALIGN_MIDDLE = "middle";
    final public const ALIGN_BOTTOM = "bottom";

    private readonly string $align;

    public function __construct(string $align)
    {
        if (!in_array($align, $this->getAlignments())) {
            throw new InvalidArgumentException('This vertical alignment is not allowed: ' . $align);
        }

        $this->align = $align;
    }

    public function __toString(): string
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
