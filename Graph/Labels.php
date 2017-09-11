<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Labels
 */
class Labels
{
    const DEFAULT_FORMAT = "{value}";

    /**
     * @var
     */
    private $format;

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
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

        return $result;
    }
}
