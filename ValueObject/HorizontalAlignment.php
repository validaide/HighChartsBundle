<?php

namespace Validaide\HighChartsBundle\ValueObject;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HorizontalAlignment
{
    const ALIGN_LEFT   = "left";
    const ALIGN_RIGHT  = "right";
    const ALIGN_CENTER = "center";

    /** @var string */
    private $align;

    /**
     * HorizontalAlignment constructor.
     *
     * @param string $align
     */
    public function __construct(string $align)
    {
        if (!in_array($align, $this->getAlignments())) {
            throw new \InvalidArgumentException('This horizontal alignment is not allowed: ' . $align);
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
            self::ALIGN_LEFT,
            self::ALIGN_RIGHT,
            self::ALIGN_CENTER,
        ];
    }
}
