<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Label
 */
class Label
{
    /**
     * @var string
     */
    private $align;

    /**
     * @var int
     */
    private $rotation;

    /**
     * @var string
     */
    private $style;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $textAlign;

    /**
     * @var bool
     */
    private $useHtml;

    /**
     * @var
     */
    private $verticalAlign;

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->format)) {
            $result['format'] = $this->format;
        }

        return $result;
    }
}
