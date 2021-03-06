<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;
use Validaide\HighChartsBundle\ValueObject\DashStyle;

/**
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Series
{
    /** @var string|null */
    private $id;

    /** @var array|null */
    private $data = null;

    /** @var string */
    private $name = '';

    /** @var Color */
    private $color = null;

    /** @var string */
    private $drilldown = null;

    /** @var string */
    private $innerSize = null;

    /** @var string|null */
    private $type = null;

    /** @var int|null */
    private $yAxis = null;

    /** @var null */
    private $tooltip = null;

    /** @var int|null */
    private $turboThreshold = null;

    /** @var int */
    private $pointInterval;

    /** @var true */
    private $visible = true;

    /** @var Marker */
    private $marker;

    /** @var null|int */
    private $zIndex;

    /** @var DataLabels */
    private $dataLabels;

    /** @var string|null */
    private $pointPlacement = null;

    /** @var DashStyle|null */
    private $dashStyle;

    /** @var bool|null */
    private $enableMouseTracking;

    /** @var bool|null */
    private $showInLegend;

    /**
     * @param string|null $name
     * @param array|null  $data
     */
    public function __construct(?string $name, ?array $data)
    {
        $this->name = $name;
        $this->data = $data;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     */
    public function setId(?string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getDrilldown()
    {
        return $this->drilldown;
    }

    /**
     * @param string $drilldown
     */
    public function setDrilldown(string $drilldown)
    {
        $this->drilldown = $drilldown;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array|null
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * @param array|null $tooltip
     */
    public function setTooltip($tooltip)
    {
        $this->tooltip = $tooltip;
    }

    /**
     * @return string
     */
    public function getInnerSize(): string
    {
        return $this->innerSize;
    }

    /**
     * @param string $innerSize
     */
    public function setInnerSize(string $innerSize)
    {
        $this->innerSize = $innerSize;
    }

    /**
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getTurboThreshold()
    {
        return $this->turboThreshold;
    }

    /**
     * @param int|null $turboThreshold
     */
    public function setTurboThreshold($turboThreshold)
    {
        $this->turboThreshold = $turboThreshold;
    }

    /**
     * @return null|Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param Color $color
     */
    public function setColor(Color $color)
    {
        $this->color = $color;
    }

    /**
     * @return int|null
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param int|null $yAxis
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;
    }

    /**
     * @return bool
     */
    public function getVisible(): bool
    {
        return $this->visible;
    }

    /**
     * @param bool $visible
     */
    public function setVisible(bool $visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return int|null
     */
    public function getPointInterval()
    {
        return $this->pointInterval;
    }

    /**
     * @param int|null $pointInterval
     */
    public function setPointInterval(int $pointInterval = null)
    {
        $this->pointInterval = $pointInterval;
    }

    /**
     * @return Marker
     */
    public function getMarker(): Marker
    {
        if (is_null($this->marker)) {
            $this->marker = new Marker();
        }

        return $this->marker;
    }

    /**
     * @return int|null
     */
    public function getZIndex()
    {
        return $this->zIndex;
    }

    /**
     * @param int|null $zIndex
     */
    public function setZIndex(int $zIndex)
    {
        $this->zIndex = $zIndex;
    }

    /**
     * @return DataLabels
     */
    public function getDataLabels(): DataLabels
    {
        if (is_null($this->dataLabels)) {
            $this->dataLabels = new Label();
        }

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
     * @return string|null
     */
    public function getPointPlacement(): ?string
    {
        return $this->pointPlacement;
    }

    /**
     * @param string $pointPlacement
     */
    public function setPointPlacement(string $pointPlacement): void
    {
        $this->pointPlacement = $pointPlacement;
    }

    /**
     * @return DashStyle
     */
    public function getDashStyle(): DashStyle
    {
        return $this->dashStyle;
    }

    /**
     * @param DashStyle $dashStyle
     */
    public function setDashStyle(DashStyle $dashStyle)
    {
        $this->dashStyle = $dashStyle;
    }

    /**
     * @return bool|null
     */
    public function getEnableMouseTracking(): ?bool
    {
        return $this->enableMouseTracking;
    }

    /**
     * @param bool|null $enableMouseTracking
     */
    public function setEnableMouseTracking(?bool $enableMouseTracking): void
    {
        $this->enableMouseTracking = $enableMouseTracking;
    }

    /**
     * @return bool|null
     */
    public function getShowInLegend(): ?bool
    {
        return $this->showInLegend;
    }

    /**
     * @param bool|null $showInLegend
     */
    public function setShowInLegend(?bool $showInLegend): void
    {
        $this->showInLegend = $showInLegend;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [
            'name' => $this->name,
        ];

        if (!is_null($this->id)) {
            $result['id'] = $this->id;
        }

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }

        if (!is_null($this->drilldown)) {
            $result['drilldown'] = $this->drilldown;
        }

        if (!is_null($this->type)) {
            $result['type'] = $this->type;
        }

        if (!is_null($this->yAxis)) {
            $result['yAxis'] = $this->yAxis;
        }

        if (!is_null($this->innerSize)) {
            $result['innerSize'] = $this->innerSize;
        }

        if (!is_null($this->pointInterval)) {
            $result['pointInterval'] = $this->pointInterval;
        }

        if (!is_null($this->tooltip)) {
            $result['tooltip'] = $this->tooltip;
        }

        if (!is_null($this->turboThreshold)) {
            $result['turboThreshold'] = $this->turboThreshold;
        }

        if (!is_null($this->marker)) {
            $result['marker'] = $this->marker->toArray();
        }

        if (!is_null($this->zIndex)) {
            $result['zIndex'] = $this->zIndex;
        }

        if (!is_null($this->dataLabels)) {
            $result['dataLabels'] = $this->dataLabels->toArray();
        }

        if (!is_null($this->pointPlacement)) {
            $result['pointPlacement'] = $this->pointPlacement;
        }

        if (!is_null($this->dashStyle)) {
            $result['dashStyle'] = (string)$this->dashStyle;
        }

        if (!is_null($this->enableMouseTracking)) {
            $result['enableMouseTracking'] = $this->enableMouseTracking;
        }

        if (!is_null($this->showInLegend)) {
            $result['showInLegend'] = $this->showInLegend;
        }

        $result['visible'] = $this->visible;
        $result['data']    = $this->data;

        return $result;
    }
}
