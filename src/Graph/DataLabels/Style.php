<?php


namespace Validaide\HighChartsBundle\Graph\DataLabels;

use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * @author Marian Miczka <marian.miczka@validaide.com>
 */
class Style
{
    /** @var Color|null  */
    private $color;
    /** @var string|null */
    private $fontSize;
    /** @var string|null */
    private $fontWeight;
    /** @var string|null */
    private $textOutline;

    /**
     * @return Color|null
     */
    public function getColor(): ?Color
    {
        return $this->color;
    }

    /**
     * @param Color|null $color
     */
    public function setColor(?Color $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string|null
     */
    public function getFontSize(): ?string
    {
        return $this->fontSize;
    }

    /**
     * @param string|null $fontSize
     */
    public function setFontSize(?string $fontSize): void
    {
        $this->fontSize = $fontSize;
    }

    /**
     * @return string|null
     */
    public function getFontWeight(): ?string
    {
        return $this->fontWeight;
    }

    /**
     * @param string|null $fontWeight
     */
    public function setFontWeight(?string $fontWeight): void
    {
        $this->fontWeight = $fontWeight;
    }

    /**
     * @return string|null
     */
    public function getTextOutline(): ?string
    {
        return $this->textOutline;
    }

    /**
     * @param string|null $textOutline
     */
    public function setTextOutline(?string $textOutline): void
    {
        $this->textOutline = $textOutline;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }
        if (!is_null($this->fontSize)) {
            $result['fontSize'] = $this->fontSize;
        }
        if (!is_null($this->fontWeight)) {
            $result['fontWeight'] = $this->fontWeight;
        }
        if (!is_null($this->textOutline)) {
            $result['textOutline'] = $this->textOutline;
        }

        return $result;
    }
}