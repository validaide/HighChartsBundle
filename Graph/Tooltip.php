<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;
/**
 * Class: Tooltip
 */
class Tooltip
{
    /** @var string */
    private $pointFormat;
    /** @var string */
    private $animation;
    /** @var Color */
    private $backgroundColor;
    /** @var int */
    private $borderRadius;
    /** @var int */
    private $borderWidth;
    /** @var Mixed */
    private $crosshairs;
    /** @var Tooltip\DateTimeLabelFormats */
    private $dateTimeLabelFormats;
    /** @var bool */
    private $enabled;
    /** @var boolean */
    private $followPointer;
    /** @var boolean */
    private $followTouchMove;
    /** @var string */
    private $footerFormat;
    /** @var string */
    private $headerFormat;
    /** @var int */
    private $hideDelay;
    /** @var boolean */
    private $outside;
    /** @var int */
    private $padding;
    /** @var boolean */
    private $shadow;
    /** @var string */
    private $shape;
    /** @var int */
    private $snap;
    /** @var boolean */
    private $split;
    /** @var boolean */
    private $useHTML;
    /** @var int */
    private $valueDecimals;
     /** @var string */
    private $valuePrefix;
    /** @var string */
    private $valueSuffix;
    /** @var string */
    private $xDateFormat;
    /** @var bool */
    private $shared;

    /**
     * @return string
     */
    public function getAnimation(): string
    {
        return $this->animation;
    }

    /**
     * @param string $animation
     */
    public function setAnimation(string $animation)
    {
        $this->animation = $animation;
    }

    /**
     * @return Color
     */
    public function getBackgroundColor(): Color
    {
        return $this->backgroundColor;
    }

    /**
     * @param Color $backgroundColor
     */
    public function setBackgroundColor(Color $backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return int
     */
    public function getBorderRadius(): int
    {
        return $this->borderRadius;
    }

    /**
     * @param int $borderRadius
     */
    public function setBorderRadius(int $borderRadius)
    {
        $this->borderRadius = $borderRadius;
    }

    /**
     * @return int
     */
    public function getBorderWidth(): int
    {
        return $this->borderWidth;
    }

    /**
     * @param int $borderWidth
     */
    public function setBorderWidth(int $borderWidth)
    {
        $this->borderWidth = $borderWidth;
    }

    /**
     * @return mixed
     */
    public function getCrosshairs()
    {
        return $this->crosshairs;
    }

    /**
     * @param mixed $crosshairs
     */
    public function setCrosshairs($crosshairs)
    {
        $this->crosshairs = $crosshairs;
    }

    /**
     * @return Tooltip\DateTimeLabelFormats
     */
    public function getDateTimeLabelFormats(): Tooltip\DateTimeLabelFormats
    {
        return $this->dateTimeLabelFormats;
    }

    /**
     * @param Tooltip\DateTimeLabelFormats $dateTimeLabelFormats
     */
    public function setDateTimeLabelFormats(Tooltip\DateTimeLabelFormats $dateTimeLabelFormats)
    {
        $this->dateTimeLabelFormats = $dateTimeLabelFormats;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return bool
     */
    public function isFollowPointer(): bool
    {
        return $this->followPointer;
    }

    /**
     * @param bool $followPointer
     */
    public function setFollowPointer(bool $followPointer)
    {
        $this->followPointer = $followPointer;
    }

    /**
     * @return bool
     */
    public function isFollowTouchMove(): bool
    {
        return $this->followTouchMove;
    }

    /**
     * @param bool $followTouchMove
     */
    public function setFollowTouchMove(bool $followTouchMove)
    {
        $this->followTouchMove = $followTouchMove;
    }

    /**
     * @return string
     */
    public function getFooterFormat(): string
    {
        return $this->footerFormat;
    }

    /**
     * @param string $footerFormat
     */
    public function setFooterFormat(string $footerFormat)
    {
        $this->footerFormat = $footerFormat;
    }

    /**
     * @return string
     */
    public function getHeaderFormat(): string
    {
        return $this->headerFormat;
    }

    /**
     * @param string $headerFormat
     */
    public function setHeaderFormat(string $headerFormat)
    {
        $this->headerFormat = $headerFormat;
    }

    /**
     * @return int
     */
    public function getHideDelay(): int
    {
        return $this->hideDelay;
    }

    /**
     * @param int $hideDelay
     */
    public function setHideDelay(int $hideDelay)
    {
        $this->hideDelay = $hideDelay;
    }

    /**
     * @return bool
     */
    public function isOutside(): bool
    {
        return $this->outside;
    }

    /**
     * @param bool $outside
     */
    public function setOutside(bool $outside)
    {
        $this->outside = $outside;
    }

    /**
     * @return int
     */
    public function getPadding(): int
    {
        return $this->padding;
    }

    /**
     * @param int $padding
     */
    public function setPadding(int $padding)
    {
        $this->padding = $padding;
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
     * @return string
     */
    public function getShape(): string
    {
        return $this->shape;
    }

    /**
     * @param string $shape
     */
    public function setShape(string $shape)
    {
        $this->shape = $shape;
    }

    /**
     * @return int
     */
    public function getSnap(): int
    {
        return $this->snap;
    }

    /**
     * @param int $snap
     */
    public function setSnap(int $snap)
    {
        $this->snap = $snap;
    }

    /**
     * @return bool
     */
    public function isSplit(): bool
    {
        return $this->split;
    }

    /**
     * @param bool $split
     */
    public function setSplit(bool $split)
    {
        $this->split = $split;
    }

    /**
     * @return bool
     */
    public function isUseHTML(): bool
    {
        return $this->useHTML;
    }

    /**
     * @param bool $useHTML
     */
    public function setUseHTML(bool $useHTML)
    {
        $this->useHTML = $useHTML;
    }

    /**
     * @return int
     */
    public function getValueDecimals(): int
    {
        return $this->valueDecimals;
    }

    /**
     * @param int $valueDecimals
     */
    public function setValueDecimals(int $valueDecimals)
    {
        $this->valueDecimals = $valueDecimals;
    }

    /**
     * @return string
     */
    public function getValuePrefix(): string
    {
        return $this->valuePrefix;
    }

    /**
     * @param string $valuePrefix
     */
    public function setValuePrefix(string $valuePrefix)
    {
        $this->valuePrefix = $valuePrefix;
    }

    /**
     * @return string
     */
    public function getValueSuffix(): string
    {
        return $this->valueSuffix;
    }

    /**
     * @param string $valueSuffix
     */
    public function setValueSuffix(string $valueSuffix)
    {
        $this->valueSuffix = $valueSuffix;
    }

    /**
     * @return string
     */
    public function getXDateFormat(): string
    {
        return $this->xDateFormat;
    }

    /**
     * @param string $xDateFormat
     */
    public function setXDateFormat(string $xDateFormat)
    {
        $this->xDateFormat = $xDateFormat;
    }

    /**
     * @return bool
     */
    public function getShared(): bool
    {
        return $this->shared;
    }

    /**
     * @param bool $shared
     */
    public function setShared(bool $shared)
    {
        $this->shared = $shared;
    }

    /**
     * @return string
     */
    public function getPointFormat()
    {
        return $this->pointFormat;
    }

    /**
     * @param string $pointFormat
     */
    public function setPointFormat($pointFormat)
    {
        $this->pointFormat = $pointFormat;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->shared)) {
            $result['shared'] = $this->shared;
        }

        if (!is_null($this->pointFormat)) {
            $result['pointFormat'] = $this->pointFormat;
        }

        return $result;
    }
    /**
     * @TODO
     */
    public function pointFormatter(){
//
//        A callback function for formatting the HTML output for a single point in the tooltip. Like the pointFormat string, but with more flexibility.
//        Defaults to undefined.
//        Context: Point.
    }
    /**
     * @TODO
     */
    public function positioner(){
//
//     A callback function to place the tooltip in a default position. The callback receives three parameters: labelWidth, labelHeight and point, where point contains values for plotX and plotY telling where the reference point is in the plot area. Add chart.plotLeft and chart.plotTop to get the full coordinates.
//     The return should be an object containing x and y values, for example { x: 100, y: 100 }.
    }
    /**
     * @TODO
     */
    public function formatter(){
//      Callback function to format the text of the tooltip from scratch. Return false to disable tooltip for a specific point on series.
//      A subset of HTML is supported. Unless useHTML is true, the HTML of the tooltip is parsed and converted to SVG, therefore this isn't a complete HTML renderer. The following tags are supported: <b>, <strong>, <i>, <em>, <br/>, <span>. Spans can be styled with a style attribute, but only text-related CSS that is shared with SVG is handled.
//      Since version 2.1 the tooltip can be shared between multiple series through the shared option. The available data in the formatter differ a bit depending on whether the tooltip is shared or not. In a shared tooltip, all properties except x, which is common for all points, are kept in an array, this.points.
//      Available data are:
//    this.percentage (not shared) / this.points[i].percentage (shared)
//    Stacked series and pies only. The point's percentage of the total.
//        this.point (not shared) / this.points[i].point (shared)
//    The point object. The point name, if defined, is available through this.point.name.
//        this.points
//    In a shared tooltip, this is an array containing all other properties for each point.
//        this.series (not shared) / this.points[i].series (shared)
//    The series object. The series name is available through this.series.name.
//        this.total (not shared) / this.points[i].total (shared)
//    Stacked series only. The total value at this point's x value.this.x
//    The x value. This property is the same regardless of the tooltip being shared or not. this.y (not shared) / this.points[i].y (shared)
//    The y value.
    }

}
