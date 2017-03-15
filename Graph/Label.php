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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->text)) {
            $result['text'] = $this->text;
        }

        return $result;
    }
}
