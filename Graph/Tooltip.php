<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Tooltip
 */
class Tooltip
{
    /** @var bool */
    private $shared;
    /** @var string */
    private $pointFormat;
    /** @var string */
    private $xDateFormat;

    /**
     * @return bool
     */
    public function getShared(): bool
    {
        return $this->shared;
    }

    /**
     * @param bool $shared
     */
    public function setShared(bool $shared)
    {
        $this->shared = $shared;
    }

    /**
     * @return string
     */
    public function getPointFormat()
    {
        return $this->pointFormat;
    }

    /**
     * @param string $pointFormat
     */
    public function setPointFormat($pointFormat)
    {
        $this->pointFormat = $pointFormat;
    }

    /**
     * @return string|null
     */
    public function getXDateFormat()
    {
        return $this->xDateFormat;
    }

    /**
     * @param string|null $xDateFormat
     */
    public function setXDateFormat(string $xDateFormat = null)
    {
        $this->xDateFormat = $xDateFormat;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->shared)) {
            $result['shared'] = $this->shared;
        }
        if (!is_null($this->pointFormat)) {
            $result['pointFormat'] = $this->pointFormat;
        }
        if (!is_null($this->pointFormat)) {
            $result['xDateFormat'] = $this->pointFormat;
        }

        return $result;
    }
}
