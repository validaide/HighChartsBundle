<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\HorizontalAlignment;
use Validaide\HighChartsBundle\ValueObject\VerticalAlignment;

/**
 * Class: Label
 */
class Label
{
    /**
     * @var HorizontalAlignment
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
     * @var HorizontalAlignment
     */
    private $textAlign;

    /**
     * @var bool
     */
    private $useHtml;

    /**
     * @var VerticalAlignment
     */
    private $verticalAlign;

    /**
     * @return HorizontalAlignment
     */
    public function getAlign(): HorizontalAlignment
    {
        return $this->align;
    }

    /**
     * @param HorizontalAlignment $align
     */
    public function setAlign(HorizontalAlignment $align)
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
     * @return HorizontalAlignment
     */
    public function getTextAlign(): HorizontalAlignment
    {
        return $this->textAlign;
    }

    /**
     * @param HorizontalAlignment $textAlign
     */
    public function setTextAlign(HorizontalAlignment $textAlign)
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
     * @return VerticalAlignment
     */
    public function getVerticalAlign(): VerticalAlignment
    {
        return $this->verticalAlign;
    }

    /**
     * @param VerticalAlignment $verticalAlign
     */
    public function setVerticalAlign(VerticalAlignment $verticalAlign)
    {
        $this->verticalAlign = $verticalAlign;
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
        if (!is_null($this->verticalAlign)) {
            $result['verticalAlign'] = (string)$this->verticalAlign;
        }

        return $result;
    }

}
