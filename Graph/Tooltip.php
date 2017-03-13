<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Tooltip
 */
class Tooltip
{
    /**
     * @var bool
     */
    private $shared;

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
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->shared)) {
            $result['shared'] = $this->shared;
        }

        return $result;
    }
}
