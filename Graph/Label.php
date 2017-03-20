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
    private $textAlignment;

    /**
     * @var bool
     */
    private $useHtml;

    /**
     * @var VerticalAlignment
     */
    private $verticalAlignment;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

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
    public function getTextAlignment(): HorizontalAlignment
    {
        return $this->textAlignment;
    }

    /**
     * @param HorizontalAlignment $textAlignment
     */
    public function setTextAlignment(HorizontalAlignment $textAlignment)
    {
        $this->textAlignment = $textAlignment;
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
    public function getVerticalAlignment(): VerticalAlignment
    {
        return $this->verticalAlignment;
    }

    /**
     * @param VerticalAlignment $verticalAlignment
     */
    public function setVerticalAlignment(VerticalAlignment $verticalAlignment)
    {
        $this->verticalAlignment = $verticalAlignment;
    }

    /**
     * @return int|null
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x)
    {
        $this->x = $x;
    }

    /**
     * @return int|null
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y)
    {
        $this->y = $y;
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
        if (!is_null($this->textAlignment)) {
            $result['textAlign'] = (string)$this->textAlignment;
        }
        if (!is_null($this->useHtml)) {
            $result['useHtml'] = $this->useHtml;
        }
        if (!is_null($this->verticalAlignment)) {
            $result['verticalAlign'] = (string)$this->verticalAlignment;
        }
        if (!is_null($this->x)) {
            $result['x'] = $this->x;
        }
        if (!is_null($this->y)) {
            $result['y'] = $this->y;
        }

        return $result;
    }

}
