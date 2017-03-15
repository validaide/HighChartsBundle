<?php

namespace Validaide\HighChartsBundle\ValueObject;

/**
 * VerticalAlignment
 */
class VerticalAlignment
{
    const ALIGN_TOP    = "top";
    const ALIGN_MIDDLE = "middle";
    const ALIGN_BOTTOM = "bottom";

    /**
     * @var string
     */
    private $align;

    /**
     * Color constructor.
     *
     * @param string $align
     */
    public function __construct($align)
    {
        if (!in_array($align, $this->getAlignments())) {
            throw new \InvalidArgumentException('This vertical alignment is not allowed: ' . $align);
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
     * @return array
     */
    public function getAlignments()
    {
        return [
            self::ALIGN_TOP,
            self::ALIGN_MIDDLE,
            self::ALIGN_BOTTOM,
        ];
    }
}
