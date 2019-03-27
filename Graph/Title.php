<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Title
{
    /** @var string|null */
    private $align;
    /** @var string|null */
    private $verticalAlign;
    /** @var int|null */
    private $y;
    /** @var string */
    private $text;
    /** @var int */
    private $margin;

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
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return null|string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * @param null|string $align
     */
    public function setAlign($align)
    {
        $this->align = $align;
    }

    /**
     * @return null|string
     */
    public function getVerticalAlign()
    {
        return $this->verticalAlign;
    }

    /**
     * @param null|string $verticalAlign
     */
    public function setVerticalAlign($verticalAlign)
    {
        $this->verticalAlign = $verticalAlign;
    }

    /**
     * @return int|null
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int|null $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getMargin(): int
    {
        return $this->margin;
    }

    /**
     * @param int $margin
     */
    public function setMargin(int $margin)
    {
        $this->margin = $margin;
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

        if (!is_null($this->align)) {
            $result['align'] = $this->align;
        }

        if (!is_null($this->margin)) {
            $result['margin'] = $this->margin;
        }

        if (!is_null($this->verticalAlign)) {
            $result['verticalAlign'] = $this->verticalAlign;
        }

        if (!is_null($this->y)) {
            $result['y'] = $this->y;
        }

        ksort($result);

        return $result;
    }
}
