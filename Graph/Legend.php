<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @author   Marian Miczka <marian.miczka@validaide.com>
 */
class Legend
{
    /**
     * @var bool
     */
    private $enabled = true;

    /**
     * @var bool
     */
    private $reversed = false;

    /**
     * @var string
     */
    private $align;

    /**
     * @var string
     */
    private $layout;

    /**
     * @var string
     */
    private $verticalAlign;

    /**
     * @return boolean
     */
    public function isEnabled(): Bool
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled(Bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return bool
     */
    public function isReversed(): bool
    {
        return $this->reversed;
    }

    /**
     * @param bool $reversed
     */
    public function setReversed(bool $reversed)
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
     * @return array
     */
    public function toArray()
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