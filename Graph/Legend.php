<?php

namespace Validaide\HighChartsBundle\Graph;

class Legend
{
    private bool    $enabled       = true;
    private bool    $reversed      = false;
    private ?string $align         = null;
    private ?string $layout        = null;
    private ?string $verticalAlign = null;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function isReversed(): bool
    {
        return $this->reversed;
    }

    public function setReversed(bool $reversed): void
    {
        $this->reversed = $reversed;
    }

    public function setAlign(?string $align): void
    {
        $this->align = $align;
    }

    public function setLayout(?string $layout): void
    {
        $this->layout = $layout;
    }

    public function setVerticalAlign(?string $verticalAlign): void
    {
        $this->verticalAlign = $verticalAlign;
    }

    /**
     * @return array<string, bool>|array<string, string>
     */
    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->enabled)) {
            $result['enabled'] = (bool)$this->enabled;
        }

        if (!is_null($this->reversed)) {
            $result['reversed'] = (bool)$this->reversed;
        }

        if (!is_null($this->align)) {
            $result['align'] = $this->align;
        }

        if (!is_null($this->layout)) {
            $result['layout'] = $this->layout;
        }

        if (!is_null($this->verticalAlign)) {
            $result['verticalAlign'] = $this->verticalAlign;
        }

        return $result;
    }
}