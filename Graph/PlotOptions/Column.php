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

    protected ?float $groupPadding = null;
    protected ?float $pointPadding = null;
    protected ?int $minPointLength = null;
    protected ?string $stacking = null;
    /** @var DataLabels|null */
    protected $dataLabels;

    public function getGroupPadding(): float
    {
        return $this->groupPadding;
    }

    public function getPointPadding(): float
    {
        return $this->pointPadding;
    }

    public function getMinPointLength(): int
    {
        return $this->minPointLength;
    }

    /**
     * @return string|null
     */
    public function getStacking(): string
    {
        return $this->stacking;
    }

    public function getDataLabels(): DataLabels
    {
        return $this->dataLabels;
    }

    public function setGroupPadding(float $groupPadding): void
    {
        $this->groupPadding = $groupPadding;
    }

    public function setPointPadding(float $pointPadding): void
    {
        $this->pointPadding = $pointPadding;
    }

    public function setMinPointLength(int $minPointLength): void
    {
        $this->minPointLength = $minPointLength;
    }

    public function setStacking(string $stacking): void
    {
        $this->stacking = $stacking;
    }

    public function setDataLabels(DataLabels $dataLabels): void
    {
        $this->dataLabels = $dataLabels;
    }

    /**
     * @return array<string, mixed[]>
     */
    public function toArray(): array
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