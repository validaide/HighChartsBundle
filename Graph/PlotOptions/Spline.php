<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\DataLabels;
use Validaide\HighChartsBundle\Graph\Label;
use Validaide\HighChartsBundle\Graph\Marker;
use Validaide\HighChartsBundle\Graph\PlotOptions;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Graph\Tooltip;
use Validaide\HighChartsBundle\ValueObject\Color;

class Spline extends PlotOptions
{
    public const STACKING_NORMAL  = 'normal';
    public const STACKING_PERCENT = 'percent';

    protected ?int     $animationLimit         = null;
    protected ?int     $boostThreshold         = null;
    protected ?string  $className              = null;
    protected ?int     $colorIndex             = null;
    protected ?bool    $connectEnds            = null;
    protected ?bool    $connectNulls           = null;
    protected ?int     $cropThreshold          = null;
    protected ?string  $cursor                 = null;
    protected ?string  $dashStyle              = null;
    protected ?array   $data                   = null;
    protected ?string  $description            = null;
    protected ?bool    $enableMouseTracking    = null;
    protected ?bool    $exposeElementToA11y    = null;
    protected ?string  $findNearestPointBy     = null;
    protected ?bool    $getExtremesFromAll     = null;
    protected ?string  $id                     = null;
    protected ?int     $index                  = null;
    protected ?array   $keys                   = null;
    protected ?Label   $label                  = null;
    protected ?int     $legendIndex            = null;
    protected ?string  $linecap                = null;
    protected ?int     $lineWidth              = null;
    protected ?string  $linkedTo               = null;
    protected ?Marker  $marker                 = null;
    protected ?string  $name                   = null;
    protected ?Color   $negativeColor          = null;
    protected ?int     $point                  = null;
    protected ?int     $pointInterval          = null;
    protected ?string  $pointIntervalUnit      = null;
    protected ?string  $pointPlacement         = null;
    protected ?int     $pointStart             = null;
    protected ?bool    $selected               = null;
    protected ?Series  $series                 = null;
    protected ?bool    $shadow                 = null;
    protected ?bool    $showCheckbox           = null;
    protected ?bool    $showInLegend           = null;
    protected ?bool    $skipKeyboardNavigation = null;
    protected ?bool    $softThreshold          = null;
    protected ?string  $stack                  = null;
    protected ?string  $stacking               = null;
    protected ?bool    $stickyTracking         = null;
    protected ?Tooltip $tooltip                = null;
    protected ?int     $turboThreshold         = null;
    protected ?string  $type                   = null;
    protected ?bool    $visible                = null;
    protected ?string  $xAxis                  = null;
    protected ?string  $yAxis                  = null;
    protected ?int     $zIndex                 = null;

    public function getAnimationLimit(): int
    {
        return $this->animationLimit;
    }

    public function setAnimationLimit(int $animationLimit): void
    {
        $this->animationLimit = $animationLimit;
    }

    public function getBoostThreshold(): int
    {
        return $this->boostThreshold;
    }

    public function setBoostThreshold(int $boostThreshold): void
    {
        $this->boostThreshold = $boostThreshold;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function getColorIndex(): int
    {
        return $this->colorIndex;
    }

    public function setColorIndex(int $colorIndex): void
    {
        $this->colorIndex = $colorIndex;
    }

    public function isConnectEnds(): bool
    {
        return $this->connectEnds;
    }

    public function setConnectEnds(bool $connectEnds): void
    {
        $this->connectEnds = $connectEnds;
    }

    public function isConnectNulls(): bool
    {
        return $this->connectNulls;
    }

    public function setConnectNulls(bool $connectNulls): void
    {
        $this->connectNulls = $connectNulls;
    }

    public function getCropThreshold(): int
    {
        return $this->cropThreshold;
    }

    public function setCropThreshold(int $cropThreshold): void
    {
        $this->cropThreshold = $cropThreshold;
    }

    public function getCursor(): string
    {
        return $this->cursor;
    }

    public function setCursor(string $cursor): void
    {
        $this->cursor = $cursor;
    }

    public function getDashStyle(): string
    {
        return $this->dashStyle;
    }

    public function setDashStyle(string $dashStyle): void
    {
        $this->dashStyle = $dashStyle;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): void
    {
        $this->data = $data;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function isEnableMouseTracking(): bool
    {
        return $this->enableMouseTracking;
    }

    public function setEnableMouseTracking(bool $enableMouseTracking): void
    {
        $this->enableMouseTracking = $enableMouseTracking;
    }

    public function isExposeElementToA11y(): bool
    {
        return $this->exposeElementToA11y;
    }

    public function setExposeElementToA11y(bool $exposeElementToA11y): void
    {
        $this->exposeElementToA11y = $exposeElementToA11y;
    }

    public function getFindNearestPointBy(): string
    {
        return $this->findNearestPointBy;
    }

    public function setFindNearestPointBy(string $findNearestPointBy): void
    {
        $this->findNearestPointBy = $findNearestPointBy;
    }

    public function isGetExtremesFromAll(): bool
    {
        return $this->getExtremesFromAll;
    }

    public function setGetExtremesFromAll(bool $getExtremesFromAll): void
    {
        $this->getExtremesFromAll = $getExtremesFromAll;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function getKeys(): ?array
    {
        return $this->keys;
    }

    public function setKeys(?array $keys): void
    {
        $this->keys = $keys;
    }

    public function getLabel(): Label
    {
        return $this->label;
    }

    public function setLabel(Label $label): void
    {
        $this->label = $label;
    }

    public function getLegendIndex(): int
    {
        return $this->legendIndex;
    }

    public function setLegendIndex(int $legendIndex): void
    {
        $this->legendIndex = $legendIndex;
    }

    public function getLinecap(): string
    {
        return $this->linecap;
    }

    public function setLinecap(string $linecap): void
    {
        $this->linecap = $linecap;
    }

    public function getLineWidth(): int
    {
        return $this->lineWidth;
    }

    public function setLineWidth(int $lineWidth): void
    {
        $this->lineWidth = $lineWidth;
    }

    public function getLinkedTo(): string
    {
        return $this->linkedTo;
    }

    public function setLinkedTo(string $linkedTo): void
    {
        $this->linkedTo = $linkedTo;
    }

    public function getMarker(): Marker
    {
        return $this->marker;
    }

    public function setMarker(Marker $marker): void
    {
        $this->marker = $marker;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNegativeColor(): Color
    {
        return $this->negativeColor;
    }

    public function setNegativeColor(Color $negativeColor): void
    {
        $this->negativeColor = $negativeColor;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function setPoint(int $point): void
    {
        $this->point = $point;
    }

    public function getPointInterval(): int
    {
        return $this->pointInterval;
    }

    public function setPointInterval(int $pointInterval): void
    {
        $this->pointInterval = $pointInterval;
    }

    public function getPointIntervalUnit(): string
    {
        return $this->pointIntervalUnit;
    }

    public function setPointIntervalUnit(string $pointIntervalUnit): void
    {
        $this->pointIntervalUnit = $pointIntervalUnit;
    }

    public function getPointPlacement(): ?string
    {
        return $this->pointPlacement;
    }

    public function setPointPlacement(?string $pointPlacement): void
    {
        $this->pointPlacement = $pointPlacement;
    }

    public function getPointStart(): int
    {
        return $this->pointStart;
    }

    public function setPointStart(int $pointStart): void
    {
        $this->pointStart = $pointStart;
    }

    public function isSelected(): bool
    {
        return $this->selected;
    }

    public function setSelected(bool $selected): void
    {
        $this->selected = $selected;
    }

    public function isShadow(): bool
    {
        return $this->shadow;
    }

    public function setShadow(bool $shadow): void
    {
        $this->shadow = $shadow;
    }

    public function isShowCheckbox(): bool
    {
        return $this->showCheckbox;
    }

    public function setShowCheckbox(bool $showCheckbox): void
    {
        $this->showCheckbox = $showCheckbox;
    }

    public function isShowInLegend(): bool
    {
        return $this->showInLegend;
    }

    public function setShowInLegend(bool $showInLegend): void
    {
        $this->showInLegend = $showInLegend;
    }

    public function isSkipKeyboardNavigation(): bool
    {
        return $this->skipKeyboardNavigation;
    }

    public function setSkipKeyboardNavigation(bool $skipKeyboardNavigation): void
    {
        $this->skipKeyboardNavigation = $skipKeyboardNavigation;
    }

    public function isSoftThreshold(): bool
    {
        return $this->softThreshold;
    }

    public function setSoftThreshold(bool $softThreshold): void
    {
        $this->softThreshold = $softThreshold;
    }

    public function getStack(): string
    {
        return $this->stack;
    }

    public function setStack(string $stack): void
    {
        $this->stack = $stack;
    }

    public function getStacking(): string
    {
        return $this->stacking;
    }

    public function setStacking(string $stacking): void
    {
        $this->stacking = $stacking;
    }

    public function isStickyTracking(): bool
    {
        return $this->stickyTracking;
    }

    public function setStickyTracking(bool $stickyTracking): void
    {
        $this->stickyTracking = $stickyTracking;
    }

    public function getTooltip(): Tooltip
    {
        return $this->tooltip;
    }

    public function setTooltip(Tooltip $tooltip): void
    {
        $this->tooltip = $tooltip;
    }

    public function getTurboThreshold(): int
    {
        return $this->turboThreshold;
    }

    public function setTurboThreshold(int $turboThreshold): void
    {
        $this->turboThreshold = $turboThreshold;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }

    public function getXAxis(): ?string
    {
        return $this->xAxis;
    }

    public function setXAxis(?string $xAxis): void
    {
        $this->xAxis = $xAxis;
    }

    public function getYAxis(): ?string
    {
        return $this->yAxis;
    }

    public function setYAxis(?string $yAxis): void
    {
        $this->yAxis = $yAxis;
    }

    public function getZIndex(): int
    {
        return $this->zIndex;
    }

    public function setZIndex(int $zIndex): void
    {
        $this->zIndex = $zIndex;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = [];
        $splinePlotOptions = [];

        if (!is_null($this->color)) {
            $splinePlotOptions['color'] = $this->color;
        }
        if (!is_null($this->allowPointSelect)) {
            $splinePlotOptions['allowPointSelect'] = $this->allowPointSelect;
        }
        if (!is_null($this->stacking)) {
            $splinePlotOptions['stacking'] = $this->stacking;
        }
        if (!is_null($this->animationLimit)) {
            $splinePlotOptions['animationLimit'] = $this->animationLimit;
        }
        if (!is_null($this->boostThreshold)) {
            $splinePlotOptions['boostThreshold'] = $this->boostThreshold;
        }
        if (!is_null($this->className)) {
            $splinePlotOptions['className'] = $this->className;
        }
        if (!is_null($this->color)) {
            $splinePlotOptions['color'] = $this->color;
        }
        if (!is_null($this->colorIndex)) {
            $splinePlotOptions['colorIndex'] = $this->colorIndex;
        }
        if (!is_null($this->connectEnds)) {
            $splinePlotOptions['connectEnds'] = $this->connectEnds;
        }
        if (!is_null($this->connectNulls)) {
            $splinePlotOptions['connectNulls'] = $this->connectNulls;
        }
        if (!is_null($this->cropThreshold)) {
            $splinePlotOptions['cropThreshold'] = $this->cropThreshold;
        }
        if (!is_null($this->cursor)) {
            $splinePlotOptions['cursor'] = $this->cursor;
        }
        if (!is_null($this->dashStyle)) {
            $splinePlotOptions['dashStyle'] = $this->dashStyle;
        }
        if (!is_null($this->data)) {
            $splinePlotOptions['data'] = $this->data;
        }
        if (!is_null($this->dataLabels) && $this->dataLabels->isEnabled()) {
            $splinePlotOptions['dataLabels'] = $this->dataLabels;
        }
        if (!is_null($this->className)) {
            $splinePlotOptions['className'] = $this->className;
        }
        if (!is_null($this->color)) {
            $splinePlotOptions['color'] = $this->color;
        }
        if (!is_null($this->shadow)) {
            $splinePlotOptions['shadow'] = $this->shadow;
        }
        if (!is_null($this->zIndex)) {
            $splinePlotOptions['zIndex'] = $this->zIndex;
        }
        if (!is_null($this->description)) {
            $splinePlotOptions['description'] = $this->description;
        }
        if (!is_null($this->enableMouseTracking)) {
            $splinePlotOptions['enableMouseTracking'] = $this->enableMouseTracking;
        }
        if (!is_null($this->exposeElementToA11y)) {
            $splinePlotOptions['exposeElementToA11y'] = $this->exposeElementToA11y;
        }
        if (!is_null($this->findNearestPointBy)) {
            $splinePlotOptions['findNearestPointBy'] = $this->findNearestPointBy;
        }
        if (!is_null($this->getExtremesFromAll)) {
            $splinePlotOptions['getExtremesFromAll'] = $this->getExtremesFromAll;
        }
        if (!is_null($this->id)) {
            $splinePlotOptions['id'] = $this->id;
        }
        if (!is_null($this->index)) {
            $splinePlotOptions['index'] = $this->index;
        }
        if (!is_null($this->keys)) {
            $splinePlotOptions['keys'] = $this->keys;
        }
        if (!is_null($this->label)) {
            $splinePlotOptions['label'] = $this->label;
        }
        if (!is_null($this->legendIndex)) {
            $splinePlotOptions['legendIndex'] = $this->legendIndex;
        }
        if (!is_null($this->linecap)) {
            $splinePlotOptions['linecap'] = $this->linecap;
        }
        if (!is_null($this->lineWidth)) {
            $splinePlotOptions['lineWidth'] = $this->lineWidth;
        }
        if (!is_null($this->linkedTo)) {
            $splinePlotOptions['linkedTo'] = $this->linkedTo;
        }
        if (!is_null($this->marker)) {
            $splinePlotOptions['marker'] = $this->marker;
        }
        if (!is_null($this->name)) {
            $splinePlotOptions['name'] = $this->name;
        }
        if (!is_null($this->negativeColor)) {
            $splinePlotOptions['negativeColor'] = $this->negativeColor;
        }
        if (!is_null($this->point)) {
            $splinePlotOptions['point'] = $this->point;
        }
        if (!is_null($this->pointInterval)) {
            $splinePlotOptions['pointInterval'] = $this->pointInterval;
        }
        if (!is_null($this->pointIntervalUnit)) {
            $splinePlotOptions['pointIntervalUnit'] = $this->pointIntervalUnit;
        }
        if (!is_null($this->pointPlacement)) {
            $splinePlotOptions['pointPlacement'] = $this->pointPlacement;
        }
        if (!is_null($this->pointStart)) {
            $splinePlotOptions['pointStart'] = $this->pointStart;
        }
        if (!is_null($this->selected)) {
            $splinePlotOptions['selected'] = $this->selected;
        }
        if (!is_null($this->shadow)) {
            $splinePlotOptions['shadow'] = $this->shadow;
        }
        if (!is_null($this->showCheckbox)) {
            $splinePlotOptions['showCheckbox'] = $this->showCheckbox;
        }
        if (!is_null($this->showInLegend)) {
            $splinePlotOptions['showInLegend'] = $this->showInLegend;
        }
        if (!is_null($this->skipKeyboardNavigation)) {
            $splinePlotOptions['skipKeyboardNavigation'] = $this->skipKeyboardNavigation;
        }
        if (!is_null($this->softThreshold)) {
            $splinePlotOptions['softThreshold'] = $this->softThreshold;
        }
        if (!is_null($this->stack)) {
            $splinePlotOptions['stack'] = $this->stack;
        }
        if (!is_null($this->stickyTracking)) {
            $splinePlotOptions['stickyTracking'] = $this->stickyTracking;
        }
        if (!is_null($this->tooltip)) {
            $splinePlotOptions['tooltip'] = $this->tooltip;
        }
        if (!is_null($this->turboThreshold)) {
            $splinePlotOptions['turboThreshold'] = $this->turboThreshold;
        }
        if (!is_null($this->type)) {
            $splinePlotOptions['type'] = $this->type;
        }
        if (!is_null($this->visible)) {
            $splinePlotOptions['visible'] = $this->visible;
        }
        if (!is_null($this->xAxis)) {
            $splinePlotOptions['xAxis'] = $this->xAxis;
        }
        if (!is_null($this->yAxis)) {
            $splinePlotOptions['yAxis'] = $this->yAxis;
        }
        if (!is_null($this->zIndex)) {
            $splinePlotOptions['zIndex'] = $this->zIndex;
        }
        if (!is_null($this->series)) {
            $splinePlotOptions['series'] = $this->series->toArray();
        }

        $result['spline'] = $splinePlotOptions;

        return $result;
    }
}
