<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\DataLabels;
use Validaide\HighChartsBundle\Graph\Label;
use Validaide\HighChartsBundle\Graph\Marker;
use Validaide\HighChartsBundle\Graph\PlotOptions;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Graph\Tooltip;
use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Spline extends PlotOptions
{
    const STACKING_NORMAL  = 'normal';
    const STACKING_PERCENT = 'percent';

    /**
     * @var int
     */
    protected $animationLimit;
    /**
     * @var int
     */
    protected $boostThreshold;
    /**
     * @var string
     */
    protected $className;
    /**
     * @var int
     */
    protected $colorIndex;
    /**
     * @var boolean
     */
    protected $connectEnds;
    /**
     * @var boolean
     */
    protected $connectNulls;
    /**
     * @var int
     */
    protected $cropThreshold;
    /**
     * @var string
     */
    protected $cursor;
    /**
     * @var string
     */
    protected $dashStyle;
    /**
     * @var array[]
     */
    protected $data;
    /**
     * @var DataLabels
     */
    protected $dataLabels;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var boolean
     */
    protected $enableMouseTracking;
    /**
     * @var boolean
     */
    protected $exposeElementToA11y;
    /**
     * @var string
     */
    protected $findNearestPointBy;
    /**
     * @var boolean
     */
    protected $getExtremesFromAll;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var int
     */
    protected $index;
    /**
     * @var array
     */
    protected $keys;
    /**
     * @var Label
     */
    protected $label;
    /**
     * @var int
     */
    protected $legendIndex;
    /**
     * @var string
     */
    protected $linecap;
    /**
     * @var int
     */
    protected $lineWidth;
    /**
     * @var string
     */
    protected $linkedTo;
    /**
     * @var Marker
     */
    protected $marker;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var Color
     */
    protected $negativeColor;
    /**
     * @var int
     */
    protected $point;
    /**
     * @var int
     */
    protected $pointInterval;
    /**
     * @var string
     */
    protected $pointIntervalUnit;
    /**
     * @var string|int
     */
    protected $pointPlacement;
    /**
     * @var int
     */
    protected $pointStart;
    /**
     * @var boolean
     */
    protected $selected;
    /**
     * @var Series
     */
    protected $series;
    /**
     * @var boolean
     */
    protected $shadow;
    /**
     * @var boolean
     */
    protected $showCheckbox;
    /**
     * @var boolean
     */
    protected $showInLegend;
    /**
     * @var boolean
     */
    protected $skipKeyboardNavigation;
    /**
     * @var boolean
     */
    protected $softThreshold;
    /**
     * @var string
     */
    protected $stack;
    /**
     * @var string
     */
    protected $stacking;
    /**
     * @var boolean
     */
    protected $stickyTracking;
    /**
     * @var Tooltip
     */
    protected $tooltip;
    /**
     * @var int
     */
    protected $turboThreshold;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var boolean
     */
    protected $visible;
    /**
     * @var string|int
     */
    protected $xAxis;
    /**
     * @var string|int
     */
    protected $yAxis;
    /**
     * @var int
     */
    protected $zIndex;


    /**
     * @return int
     */
    public function getAnimationLimit(): int
    {
        return $this->animationLimit;
    }

    /**
     * @param int $animationLimit
     */
    public function setAnimationLimit(int $animationLimit)
    {
        $this->animationLimit = $animationLimit;
    }

    /**
     * @return int
     */
    public function getBoostThreshold(): int
    {
        return $this->boostThreshold;
    }

    /**
     * @param int $boostThreshold
     */
    public function setBoostThreshold(int $boostThreshold)
    {
        $this->boostThreshold = $boostThreshold;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @param string $className
     */
    public function setClassName(string $className)
    {
        $this->className = $className;
    }

    /**
     * @return int
     */
    public function getColorIndex(): int
    {
        return $this->colorIndex;
    }

    /**
     * @param int $colorIndex
     */
    public function setColorIndex(int $colorIndex)
    {
        $this->colorIndex = $colorIndex;
    }

    /**
     * @return bool
     */
    public function isConnectEnds(): bool
    {
        return $this->connectEnds;
    }

    /**
     * @param bool $connectEnds
     */
    public function setConnectEnds(bool $connectEnds)
    {
        $this->connectEnds = $connectEnds;
    }

    /**
     * @return bool
     */
    public function isConnectNulls(): bool
    {
        return $this->connectNulls;
    }

    /**
     * @param bool $connectNulls
     */
    public function setConnectNulls(bool $connectNulls)
    {
        $this->connectNulls = $connectNulls;
    }

    /**
     * @return int
     */
    public function getCropThreshold(): int
    {
        return $this->cropThreshold;
    }

    /**
     * @param int $cropThreshold
     */
    public function setCropThreshold(int $cropThreshold)
    {
        $this->cropThreshold = $cropThreshold;
    }

    /**
     * @return string
     */
    public function getCursor(): string
    {
        return $this->cursor;
    }

    /**
     * @param string $cursor
     */
    public function setCursor(string $cursor)
    {
        $this->cursor = $cursor;
    }

    /**
     * @return string
     */
    public function getDashStyle(): string
    {
        return $this->dashStyle;
    }

    /**
     * @param string $dashStyle
     */
    public function setDashStyle(string $dashStyle)
    {
        $this->dashStyle = $dashStyle;
    }

    /**
     * @return array[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array[] $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isEnableMouseTracking(): bool
    {
        return $this->enableMouseTracking;
    }

    /**
     * @param bool $enableMouseTracking
     */
    public function setEnableMouseTracking(bool $enableMouseTracking)
    {
        $this->enableMouseTracking = $enableMouseTracking;
    }

    /**
     * @return bool
     */
    public function isExposeElementToA11y(): bool
    {
        return $this->exposeElementToA11y;
    }

    /**
     * @param bool $exposeElementToA11y
     */
    public function setExposeElementToA11y(bool $exposeElementToA11y)
    {
        $this->exposeElementToA11y = $exposeElementToA11y;
    }

    /**
     * @return string
     */
    public function getFindNearestPointBy(): string
    {
        return $this->findNearestPointBy;
    }

    /**
     * @param string $findNearestPointBy
     */
    public function setFindNearestPointBy(string $findNearestPointBy)
    {
        $this->findNearestPointBy = $findNearestPointBy;
    }

    /**
     * @return bool
     */
    public function isGetExtremesFromAll(): bool
    {
        return $this->getExtremesFromAll;
    }

    /**
     * @param bool $getExtremesFromAll
     */
    public function setGetExtremesFromAll(bool $getExtremesFromAll)
    {
        $this->getExtremesFromAll = $getExtremesFromAll;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index)
    {
        $this->index = $index;
    }

    /**
     * @return array
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * @param array $keys
     */
    public function setKeys(array $keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return Label
     */
    public function getLabel(): Label
    {
        return $this->label;
    }

    /**
     * @param Label $label
     */
    public function setLabel(Label $label)
    {
        $this->label = $label;
    }

    /**
     * @return int
     */
    public function getLegendIndex(): int
    {
        return $this->legendIndex;
    }

    /**
     * @param int $legendIndex
     */
    public function setLegendIndex(int $legendIndex)
    {
        $this->legendIndex = $legendIndex;
    }

    /**
     * @return string
     */
    public function getLinecap(): string
    {
        return $this->linecap;
    }

    /**
     * @param string $linecap
     */
    public function setLinecap(string $linecap)
    {
        $this->linecap = $linecap;
    }

    /**
     * @return int
     */
    public function getLineWidth(): int
    {
        return $this->lineWidth;
    }

    /**
     * @param int $lineWidth
     */
    public function setLineWidth(int $lineWidth)
    {
        $this->lineWidth = $lineWidth;
    }

    /**
     * @return string
     */
    public function getLinkedTo(): string
    {
        return $this->linkedTo;
    }

    /**
     * @param string $linkedTo
     */
    public function setLinkedTo(string $linkedTo)
    {
        $this->linkedTo = $linkedTo;
    }

    /**
     * @return Marker
     */
    public function getMarker(): Marker
    {
        return $this->marker;
    }

    /**
     * @param Marker $marker
     */
    public function setMarker(Marker $marker)
    {
        $this->marker = $marker;
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
     * @return Color
     */
    public function getNegativeColor(): Color
    {
        return $this->negativeColor;
    }

    /**
     * @param Color $negativeColor
     */
    public function setNegativeColor(Color $negativeColor)
    {
        $this->negativeColor = $negativeColor;
    }

    /**
     * @return int
     */
    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint(int $point)
    {
        $this->point = $point;
    }

    /**
     * @return int
     */
    public function getPointInterval(): int
    {
        return $this->pointInterval;
    }

    /**
     * @param int $pointInterval
     */
    public function setPointInterval(int $pointInterval)
    {
        $this->pointInterval = $pointInterval;
    }

    /**
     * @return string
     */
    public function getPointIntervalUnit(): string
    {
        return $this->pointIntervalUnit;
    }

    /**
     * @param string $pointIntervalUnit
     */
    public function setPointIntervalUnit(string $pointIntervalUnit)
    {
        $this->pointIntervalUnit = $pointIntervalUnit;
    }

    /**
     * @return int|string
     */
    public function getPointPlacement()
    {
        return $this->pointPlacement;
    }

    /**
     * @param int|string $pointPlacement
     */
    public function setPointPlacement($pointPlacement)
    {
        $this->pointPlacement = $pointPlacement;
    }

    /**
     * @return int
     */
    public function getPointStart(): int
    {
        return $this->pointStart;
    }

    /**
     * @param int $pointStart
     */
    public function setPointStart(int $pointStart)
    {
        $this->pointStart = $pointStart;
    }

    /**
     * @return bool
     */
    public function isSelected(): bool
    {
        return $this->selected;
    }

    /**
     * @param bool $selected
     */
    public function setSelected(bool $selected)
    {
        $this->selected = $selected;
    }

    /**
     * @return bool
     */
    public function isShadow(): bool
    {
        return $this->shadow;
    }

    /**
     * @param bool $shadow
     */
    public function setShadow(bool $shadow)
    {
        $this->shadow = $shadow;
    }

    /**
     * @return bool
     */
    public function isShowCheckbox(): bool
    {
        return $this->showCheckbox;
    }

    /**
     * @param bool $showCheckbox
     */
    public function setShowCheckbox(bool $showCheckbox)
    {
        $this->showCheckbox = $showCheckbox;
    }

    /**
     * @return bool
     */
    public function isShowInLegend(): bool
    {
        return $this->showInLegend;
    }

    /**
     * @param bool $showInLegend
     */
    public function setShowInLegend(bool $showInLegend)
    {
        $this->showInLegend = $showInLegend;
    }

    /**
     * @return bool
     */
    public function isSkipKeyboardNavigation(): bool
    {
        return $this->skipKeyboardNavigation;
    }

    /**
     * @param bool $skipKeyboardNavigation
     */
    public function setSkipKeyboardNavigation(bool $skipKeyboardNavigation)
    {
        $this->skipKeyboardNavigation = $skipKeyboardNavigation;
    }

    /**
     * @return bool
     */
    public function isSoftThreshold(): bool
    {
        return $this->softThreshold;
    }

    /**
     * @param bool $softThreshold
     */
    public function setSoftThreshold(bool $softThreshold)
    {
        $this->softThreshold = $softThreshold;
    }

    /**
     * @return string
     */
    public function getStack(): string
    {
        return $this->stack;
    }

    /**
     * @param string $stack
     */
    public function setStack(string $stack)
    {
        $this->stack = $stack;
    }

    /**
     * @return string
     */
    public function getStacking(): string
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
     * @return bool
     */
    public function isStickyTracking(): bool
    {
        return $this->stickyTracking;
    }

    /**
     * @param bool $stickyTracking
     */
    public function setStickyTracking(bool $stickyTracking)
    {
        $this->stickyTracking = $stickyTracking;
    }

    /**
     * @return Tooltip
     */
    public function getTooltip(): Tooltip
    {
        return $this->tooltip;
    }

    /**
     * @param Tooltip $tooltip
     */
    public function setTooltip(Tooltip $tooltip)
    {
        $this->tooltip = $tooltip;
    }

    /**
     * @return int
     */
    public function getTurboThreshold(): int
    {
        return $this->turboThreshold;
    }

    /**
     * @param int $turboThreshold
     */
    public function setTurboThreshold(int $turboThreshold)
    {
        $this->turboThreshold = $turboThreshold;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
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
     * @return int|string
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * @param int|string $xAxis
     */
    public function setXAxis($xAxis)
    {
        $this->xAxis = $xAxis;
    }

    /**
     * @return int|string
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param int|string $yAxis
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;
    }

    /**
     * @return int
     */
    public function getZIndex(): int
    {
        return $this->zIndex;
    }

    /**
     * @param int $zIndex
     */
    public function setZIndex(int $zIndex)
    {
        $this->zIndex = $zIndex;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result['spline']  = [];
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
        if (!is_null($this->dataLabels)) {
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