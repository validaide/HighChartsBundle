<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Labels
{
    const DEFAULT_FORMAT = "{value}";

    /** @var string|null */
    private $format;

    /** @var string|null */
    private $formatter;

    /** @var bool|null */
    private $enabled;

    /**
     * @return null|string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * @return null|string
     */
    public function getFormatter(): string
    {
        return $this->formatter;
    }

    /**
     * @param null|string $formatter
     */
    public function setFormatter(string $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param bool|null $enabled
     */
    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return array
     */
    public function toArray()
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
