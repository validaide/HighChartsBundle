<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class DataLabels
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class DataLabels
{
    const DEFAULT_FORMAT = "{value}";

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $format;

    /**
     * @return bool|null
     */
    public function isEnabled()
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
     * @return string|null
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
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->enabled)) {
            $result['enabled'] = $this->enabled;
        }

        if (!is_null($this->format)) {
            $result['format'] = $this->format;
        }

        return $result;
    }
}
