<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Credits
 */
class Credits
{
    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $href;

    /**
     * @var string
     */
    private $style;

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
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
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref(string $href)
    {
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * @param string $style
     */
    public function setStyle(string $style)
    {
        $this->style = $style;
    }

    /**
     * @return string
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->enabled)) {
            $result['enabled'] = $this->enabled;
        }
        if (!is_null($this->href)) {
            $result['href'] = $this->href;
        }
        if (!is_null($this->style)) {
            $result['style'] = $this->style;
        }
        if (!is_null($this->text)) {
            $result['text'] = $this->text;
        }

        return $result;
    }
}
