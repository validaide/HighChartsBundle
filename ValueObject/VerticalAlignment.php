<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;
/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class VerticalAlignment
{
    const ALIGN_TOP    = "top";
    const ALIGN_MIDDLE = "middle";
    const ALIGN_BOTTOM = "bottom";

    private string $align;

    /**
     * VerticalAlignment constructor.
     */
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
