<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Credits
{
    private ?bool $enabled = null;

    private ?string $text = null;

    private ?string $href = null;

    private ?string $style = null;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    public function getStyle(): string
    {
        return $this->style;
    }

    public function setStyle(string $style): void
    {
        $this->style = $style;
    }

    /**
     * @return array<string, bool>|array<string, string>
     */
    public function toArray(): array
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
