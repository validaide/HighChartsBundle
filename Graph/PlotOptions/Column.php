<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Column extends PlotOptions
{
    const STACKING_NORMAL  = 'normal';
    const STACKING_PERCENT = 'percent';

    /** @var float */
    protected $groupPadding;
    /** @var float */
    protected $pointPadding;
    /** @var string */
    protected $stacking;

    /**
     * @return float
     */
    public function getGroupPadding(): float
    {
        return $this->groupPadding;
    }

    /**
     * @return float
     */
    public function getPointPadding(): float
    {
        return $this->pointPadding;
    }

    /**
     * @return string|null
     */
    public function getStacking()
    {
        return $this->stacking;
    }

    /**
     * @param float $groupPadding
     */
    public function setGroupPadding(float $groupPadding): void
    {
        $this->groupPadding = $groupPadding;
    }

    /**
     * @param float $pointPadding
     */
    public function setPointPadding(float $pointPadding): void
    {
        $this->pointPadding = $pointPadding;
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

        if (!is_null($this->allowPointSelect)) {
            $result['column']['allowPointSelect'] = $this->allowPointSelect;
        }

        if (!is_null($this->color)) {
            $result['column']['color'] = $this->color;
        }

        if (!is_null($this->groupPadding)) {
            $result['column']['groupPadding'] = $this->groupPadding;
        }

        if (!is_null($this->pointPadding)) {
            $result['column']['pointPadding'] = $this->pointPadding;
        }

        if (!is_null($this->stacking)) {
            $result['column']['stacking'] = $this->stacking;
        }

        return $result;
    }
}