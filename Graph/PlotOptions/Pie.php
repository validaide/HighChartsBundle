<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\DataLabels;
use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * Class Pie
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Pie extends PlotOptions
{
    /**
     * @var float
     */
    public $startAngle = null;

    /**
     * @var float
     */
    public $endAngle = null;

    /**
     * @var DataLabels
     */
    public $dataLabels = null;

    /**
     * @var int|string|null
     */
    public $innerSize = null;

    /**
     * @var array
     */
    public $center = null;

    /**
     * @var bool|null
     */
    public $showInLegend = null;

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
    public function getStartAngle()
    {
        return $this->startAngle;
    }

    /**
     * @param float|null $startAngle
     */
    public function setStartAngle($startAngle)
    {
        $this->startAngle = $startAngle;
    }

    /**
     * @return float|null
     */
    public function getEndAngle()
    {
        return $this->endAngle;
    }

    /**
     * @param float|null $endAngle
     */
    public function setEndAngle($endAngle)
    {
        $this->endAngle = $endAngle;
    }

    /**
     * @return DataLabels
     */
    public function getDataLabels(): DataLabels
    {
        return $this->dataLabels;
    }

    /**
     * @param DataLabels $dataLabels
     */
    public function setDataLabels(DataLabels $dataLabels)
    {
        $this->dataLabels = $dataLabels;
    }

    /**
     * @return array|null
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * @param array|null $center
     */
    public function setCenter($center)
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
    public function setInnerSize($innerSize)
    {
        $this->innerSize = $innerSize;
    }

    /**
     * @return bool|null
     */
    public function getShowInLegend()
    {
        return $this->showInLegend;
    }

    /**
     * @param bool|null $showInLegend
     */
    public function setShowInLegend($showInLegend)
    {
        $this->showInLegend = $showInLegend;
    }

    /**
     * @return array
     */
    public function toArray()
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