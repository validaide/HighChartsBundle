<?php

namespace Validaide\HighChartsBundle\Graph;

class Labels
{
    public const DEFAULT_FORMAT = "{value}";

    private ?string $format    = null;
    private ?string $formatter = null;
    private ?bool   $enabled   = null;

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): void
    {
        $this->format = $format;
    }

    public function getFormatter(): ?string
    {
        return $this->formatter;
    }

    public function setFormatter(?string $formatter): void
    {
        $this->formatter = $formatter;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return array<string, bool>|array<string, string>
     */
    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->format)) {
            $result['format'] = $this->format;
        }
        if (!is_null($this->formatter)) {
            $result['formatter'] = $this->formatter;
        }
        if (!is_null($this->enabled)) {
            $result['enabled'] = $this->enabled;
        }

        return $result;
    }
}
