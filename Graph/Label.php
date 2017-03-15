<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\HorizontalAligment;

/**
 * Class: Label
 */
class Label
{
    /**
     * @var HorizontalAligment
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
     * @var HorizontalAligment
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
     * @return HorizontalAligment
     */
    public function getAlign(): HorizontalAligment
    {
        return $this->align;
    }

    /**
     * @param HorizontalAligment $align
     */
    public function setAlign(HorizontalAligment $align)
    {
        $this->align = $align;
    }

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
     * @return HorizontalAligment
     */
    public function getTextAlign(): HorizontalAligment
    {
        return $this->textAlign;
    }

    /**
     * @param HorizontalAligment $textAlign
     */
    public function setTextAlign(HorizontalAligment $textAlign)
    {
        $this->textAlign = $textAlign;
    }

    /**
     * @return bool
     */
    public function isUseHtml(): bool
    {
        return $this->useHtml;
    }

    /**
     * @param bool $useHtml
     */
    public function setUseHtml(bool $useHtml)
    {
        $this->useHtml = $useHtml;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->align)) {
            $result['align'] = (string)$this->align;
        }
        if (!is_null($this->text)) {
            $result['text'] = $this->text;
        }
        if (!is_null($this->textAlign)) {
            $result['textAlign'] = (string)$this->textAlign;
        }
        if (!is_null($this->useHtml)) {
            $result['useHtml'] = $this->useHtml;
        }

        return $result;
    }
}
