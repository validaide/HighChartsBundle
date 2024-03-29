<?php

namespace Validaide\HighChartsBundle\Graph;

class Title
{
    private ?string $text          = null;
    private ?string $align         = null;
    private ?string $verticalAlign = null;
    private ?int    $y             = null;
    private ?int    $margin        = null;
    private ?bool   $hidden        = null;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getAlign(): ?string
    {
        return $this->align;
    }

    public function setAlign(?string $align): void
    {
        $this->align = $align;
    }

    public function getVerticalAlign(): ?string
    {
        return $this->verticalAlign;
    }

    public function setVerticalAlign(?string $verticalAlign): void
    {
        $this->verticalAlign = $verticalAlign;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(?int $y): void
    {
        $this->y = $y;
    }

    public function getMargin(): int
    {
        return $this->margin;
    }

    public function setMargin(int $margin): void
    {
        $this->margin = $margin;
    }

    public function setHidden(?bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->text) && $this->hidden !== true) {
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
