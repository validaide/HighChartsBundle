<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Column extends PlotOptions
{
    const STACKING_NORMAL  = 'normal';
    const STACKING_PERCENT = 'percent';

    /**
     * @var string
     */
    protected $stacking;

    /**
     * @return string|null
     */
    public function getStacking()
    {
        return $this->stacking;
    }

    /**
     * @param string $stacking
     */
    public function setStacking(string $stacking)
    {
        $this->stacking = $stacking;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->color)) {
            $result['series']['color'] = $this->color;
        }

        if (!is_null($this->allowPointSelect)) {
            $result['series']['allowPointSelect'] = $this->allowPointSelect;
        }

        if (!is_null($this->stacking)) {
            $result['series']['stacking'] = $this->stacking;
        }

        return $result;
    }
}