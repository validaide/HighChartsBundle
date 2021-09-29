<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\DataLabels;
use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Pie extends PlotOptions
{
    public ?float $startAngle = null;

    public ?float $endAngle = null;

    /**
     * @var DataLabels
     */
    public $dataLabels;

    /**
     * @var int|string|null
     */
    public $innerSize;

    public ?array $center = null;

    public ?bool $showInLegend = null;

    /**
     * Pie constructor.
     */
    public function __construct()
    {
        $this->dataLabels = new DataLabels();
    }

    /**
     * @return float|null
     */
    public function getStartAngle(): float
    {
        return $this->startAngle;
    }

    public function setStartAngle(?float $startAngle): void
    {
        $this->startAngle = $startAngle;
    }

    /**
     * @return float|null
     */
    public function getEndAngle(): float
    {
        return $this->endAngle;
    }

    public function setEndAngle(?float $endAngle): void
    {
        $this->endAngle = $endAngle;
    }

    public function getDataLabels(): DataLabels
    {
        return $this->dataLabels;
    }

    public function setDataLabels(DataLabels $dataLabels): void
    {
        $this->dataLabels = $dataLabels;
    }

    /**
     * @return array|null
     */
    public function getCenter(): array
    {
        return $this->center;
    }

    public function setCenter(?array $center): void
    {
        $this->center = $center;
    }

    /**
     * @return int|null|string
     */
    public function getInnerSize()
    {
        return $this->innerSize;
    }

    /**
     * @param int|null|string $innerSize
     */
    public function setInnerSize($innerSize): void
    {
        $this->innerSize = $innerSize;
    }

    public function getShowInLegend(): ?bool
    {
        return $this->showInLegend;
    }

    public function setShowInLegend(?bool $showInLegend): void
    {
        $this->showInLegend = $showInLegend;
    }

    /**
     * @return array<string, mixed[]>
     */
    public function toArray(): array
    {
        $result['pie'] = [];

        $piePlotOptions = [];

        if (!is_null($this->allowPointSelect)) {
            $piePlotOptions['series']['allowPointSelect'] = $this->allowPointSelect;
        }

        if (!is_null($this->center)) {
            $piePlotOptions['center'] = $this->center;
        }

        if (!is_null($this->endAngle)) {
            $piePlotOptions['endAngle'] = $this->endAngle;
        }

        if (!is_null($this->color)) {
            $piePlotOptions['series']['color'] = $this->color;
        }

        if (!is_null($this->dataLabels) && !empty($this->dataLabels->toArray())) {
            $piePlotOptions['dataLabels'] = $this->dataLabels->toArray();
        }

        if (!is_null($this->innerSize)) {
            $piePlotOptions['innerSize'] = $this->innerSize;
        }

        if (!is_null($this->startAngle)) {
            $piePlotOptions['startAngle'] = $this->startAngle;
        }

        if (!is_null($this->showInLegend)) {
            $piePlotOptions['showInLegend'] = $this->showInLegend;
        }

        // Ensure we always have a well-sorted list
        ksort($piePlotOptions);

        $result['pie'] = $piePlotOptions;

        return $result;
    }
}