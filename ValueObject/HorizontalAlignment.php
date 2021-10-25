<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;
/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HorizontalAlignment
{
    const ALIGN_LEFT   = "left";
    const ALIGN_RIGHT  = "right";
    const ALIGN_CENTER = "center";

    private string $align;

    /**
     * HorizontalAlignment constructor.
     */
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
        return (string)$this->align;
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
