<?php

namespace Validaide\HighChartsBundle\Graph\DataLabels;

use Validaide\HighChartsBundle\ValueObject\Color;

class Style
{
    private ?Color $color = null;
    private ?string $fontSize = null;
    private ?string $fontWeight = null;
    private ?string $textOutline = null;

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): void
    {
        $this->color = $color;
    }

    public function getFontSize(): ?string
    {
        return $this->fontSize;
    }

    public function setFontSize(?string $fontSize): void
    {
        $this->fontSize = $fontSize;
    }

    public function getFontWeight(): ?string
    {
        return $this->fontWeight;
    }

    public function setFontWeight(?string $fontWeight): void
    {
        $this->fontWeight = $fontWeight;
    }

    public function getTextOutline(): ?string
    {
        return $this->textOutline;
    }

    public function setTextOutline(?string $textOutline): void
    {
        $this->textOutline = $textOutline;
    }


    public function toArray(): array
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