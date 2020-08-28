<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\DataLabels;
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
    /** @var int */
    protected $minPointLength;
    /** @var string */
    protected $stacking;
    /** @var DataLabels|null */
    protected $dataLabels;

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
     * @return int
     */
    public function getMinPointLength(): int
    {
        return $this->minPointLength;
    }

    /**
     * @return string|null
     */
    public function getStacking()
    {
        return $this->stacking;
    }

    /**
     * @return DataLabels
     */
    public function getDataLabels(): DataLabels
    {
        return $this->dataLabels;
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
     * @param int $minPointLength
     */
    public function setMinPointLength(int $minPointLength): void
    {
        $this->minPointLength = $minPointLength;
    }

    /**
     * @param string $stacking
     */
    public function setStacking(string $stacking)
    {
        $this->stacking = $stacking;
    }

    /**
     * @param DataLabels $dataLabels
     */
    public function setDataLabels(DataLabels $dataLabels): void
    {
        $this->dataLabels = $dataLabels;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->groupPadding)) {
            $result['column']['groupPadding'] = $this->groupPadding;
        }

        if (!is_null($this->pointPadding)) {
            $result['column']['pointPadding'] = $this->pointPadding;
        }

        if (!is_null($this->minPointLength)) {
            $result['column']['minPointLength'] = $this->minPointLength;
        }

        if (!is_null($this->allowPointSelect)) {
            $result['series']['allowPointSelect'] = $this->allowPointSelect;
        }

        if (!is_null($this->color)) {
            $result['series']['color'] = $this->color;
        }

        if (!is_null($this->stacking)) {
            $result['series']['stacking'] = $this->stacking;
        }

        if (!is_null($this->dataLabels)) {
            $result['series']['dataLabels'] = $this->dataLabels->toArray();
        }

        return $result;
    }
}