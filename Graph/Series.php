<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;
use Validaide\HighChartsBundle\ValueObject\DashStyle;

class Series
{
    private ?array  $data;
    private ?string $name;

    private ?string    $id                  = null;
    private ?Color     $color               = null;
    private ?string    $drilldown           = null;
    private ?string    $innerSize           = null;
    private ?string    $type                = null;
    private ?int       $yAxis               = null;
    private ?array     $tooltip             = null;
    private ?int       $turboThreshold      = null;
    private ?int       $pointInterval       = null;
    private bool       $visible             = true;
    private ?Marker    $marker              = null;
    private ?int       $zIndex              = null;
    private ?string    $pointPlacement      = null;
    private ?DashStyle $dashStyle           = null;
    private ?bool      $enableMouseTracking = null;
    private ?bool      $showInLegend        = null;

    private DataLabels $dataLabels;

    public function __construct(?string $name, ?array $data)
    {
        $this->name       = $name;
        $this->data       = $data;
        $this->dataLabels = new DataLabels();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getDrilldown(): ?string
    {
        return $this->drilldown;
    }

    public function setDrilldown(?string $drilldown): void
    {
        $this->drilldown = $drilldown;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): void
    {
        $this->data = $data;
    }

    public function getTooltip(): ?array
    {
        return $this->tooltip;
    }

    public function setTooltip(?array $tooltip): void
    {
        $this->tooltip = $tooltip;
    }

    public function getInnerSize(): string
    {
        return $this->innerSize;
    }

    public function setInnerSize(string $innerSize): void
    {
        $this->innerSize = $innerSize;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getTurboThreshold(): ?int
    {
        return $this->turboThreshold;
    }

    public function setTurboThreshold(?int $turboThreshold): void
    {
        $this->turboThreshold = $turboThreshold;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function getYAxis(): ?int
    {
        return $this->yAxis;
    }

    public function setYAxis(?int $yAxis): void
    {
        $this->yAxis = $yAxis;
    }

    public function getVisible(): bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }

    public function getPointInterval(): ?int
    {
        return $this->pointInterval;
    }

    public function setPointInterval(?int $pointInterval = null): void
    {
        $this->pointInterval = $pointInterval;
    }

    public function getMarker(): Marker
    {
        if (is_null($this->marker)) {
            $this->marker = new Marker();
        }

        return $this->marker;
    }

    public function getZIndex(): ?int
    {
        return $this->zIndex;
    }

    public function setZIndex(?int $zIndex): void
    {
        $this->zIndex = $zIndex;
    }

    public function getDataLabels(): DataLabels
    {
        return $this->dataLabels;
    }

    public function setDataLabels(DataLabels $dataLabels): void
    {
        $this->dataLabels = $dataLabels;
    }

    public function getPointPlacement(): ?string
    {
        return $this->pointPlacement;
    }

    public function setPointPlacement(?string $pointPlacement): void
    {
        $this->pointPlacement = $pointPlacement;
    }

    public function getDashStyle(): ?DashStyle
    {
        return $this->dashStyle;
    }

    public function setDashStyle(?DashStyle $dashStyle): void
    {
        $this->dashStyle = $dashStyle;
    }

    public function getEnableMouseTracking(): ?bool
    {
        return $this->enableMouseTracking;
    }

    public function setEnableMouseTracking(?bool $enableMouseTracking): void
    {
        $this->enableMouseTracking = $enableMouseTracking;
    }

    public function getShowInLegend(): ?bool
    {
        return $this->showInLegend;
    }

    public function setShowInLegend(?bool $showInLegend): void
    {
        $this->showInLegend = $showInLegend;
    }

    public function toArray(): array
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

        if (!is_null($this->dataLabels) && $this->dataLabels->isEnabled()) {
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
