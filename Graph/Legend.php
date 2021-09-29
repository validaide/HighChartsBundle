<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @author   Marian Miczka <marian.miczka@validaide.com>
 */
class Legend
{
    private bool $enabled = true;

    private bool $reversed = false;

    private ?string $align = null;

    private ?string $layout = null;

    private ?string $verticalAlign = null;

    public function isEnabled(): Bool
    {
        return $this->enabled;
    }

    public function setEnabled(Bool $enabled): void
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

    /**
     * @param string|null $align
     */
    public function setAlign(string $align): void
    {
        $this->align = $align;
    }

    /**
     * @param string|null $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * @param string|null $verticalAlign
     */
    public function setVerticalAlign(string $verticalAlign): void
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