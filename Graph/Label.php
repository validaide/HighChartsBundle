<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\HorizontalAlignment;
use Validaide\HighChartsBundle\ValueObject\VerticalAlignment;

class Label
{
    private ?HorizontalAlignment $align             = null;
    private ?int                 $rotation          = null;
    private ?string              $text              = null;
    private ?HorizontalAlignment $textAlignment     = null;
    private ?bool                $useHtml           = null;
    private ?VerticalAlignment   $verticalAlignment = null;
    private ?int                 $x                 = null;
    private ?int                 $y                 = null;

    public function getAlign(): HorizontalAlignment
    {
        return $this->align;
    }

    public function setAlign(?HorizontalAlignment $align): void
    {
        $this->align = $align;
    }

    public function getRotation(): int
    {
        return $this->rotation;
    }

    public function setRotation(?int $rotation): void
    {
        $this->rotation = $rotation;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getTextAlignment(): ?HorizontalAlignment
    {
        return $this->textAlignment;
    }

    public function setTextAlignment(?HorizontalAlignment $textAlignment): void
    {
        $this->textAlignment = $textAlignment;
    }

    public function isUseHtml(): ?bool
    {
        return $this->useHtml;
    }

    public function setUseHtml(?bool $useHtml): void
    {
        $this->useHtml = $useHtml;
    }

    public function getVerticalAlignment(): ?VerticalAlignment
    {
        return $this->verticalAlignment;
    }

    public function setVerticalAlignment(?VerticalAlignment $verticalAlignment): void
    {
        $this->verticalAlignment = $verticalAlignment;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(?int $x): void
    {
        $this->x = $x;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(?int $y): void
    {
        $this->y = $y;
    }

    /**
     * @return array<string, bool>|array<string, int>|array<string, string>
     */
    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->align)) {
            $result['align'] = (string)$this->align;
        }
        if (!is_null($this->rotation)) {
            $result['rotation'] = $this->rotation;
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
