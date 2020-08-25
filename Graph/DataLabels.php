<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\Graph\DataLabels\Filter;
use Validaide\HighChartsBundle\Graph\DataLabels\Style;
use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class DataLabels
{
    const DEFAULT_FORMAT = "{value}";

    /**
     * @var string
     */
    private $align;
    /**
     * @var boolean
     */
    private $allowOverlap;
    /**
     * @var Color
     */
    private $backgroundColor;
    /**
     * @var Color
     */
    private $borderColor;
    /**
     * @var int
     */
    private $borderRadius;
    /**
     * @var int
     */
    private $borderWidth;
    /**
     * @var string
     */
    private $className;
    /**
     * @var Color
     */
    private $color;
    /**
     * @var boolean
     */
    private $crop;
    /**
     * @var boolean
     */
    private $defer;
    /**
     * @var Filter
     */
    private $filter;
    /**
     * @var boolean
     */
    private $inside;
    /**
     * @var string
     */
    private $overflow;
    /**
     * @var int
     */
    private $padding;
    /**
     * @var int
     */
    private $rotation;
    /**
     * @var boolean
     */
    private $shadow;
    /**
     * @var string
     */
    private $shape;
    /**
     * @var Style
     */
    private $style;
    /**
     * @var boolean
     */
    private $useHTML;
    /**
     * @var string
     */
    private $verticalAlign;
    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;
    /**
     * @var int
     */
    private $zIndex;
    /**
     * @var int|null
     */
    private $distance;
    /**
     * @var bool
     */
    private $enabled;
    /**
     * @var string
     */
    private $format;

    public function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param int|null $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * @return bool|null
     */
    public function isEnabled()
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
     * @return string|null
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getAlign(): string
    {
        return $this->align;
    }

    /**
     * @param string $align
     */
    public function setAlign(string $align)
    {
        $this->align = $align;
    }

    /**
     * @return bool
     */
    public function isAllowOverlap(): bool
    {
        return $this->allowOverlap;
    }

    /**
     * @param bool $allowOverlap
     */
    public function setAllowOverlap(bool $allowOverlap)
    {
        $this->allowOverlap = $allowOverlap;
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
     * @return Color
     */
    public function getBorderColor(): Color
    {
        return $this->borderColor;
    }

    /**
     * @param Color $borderColor
     */
    public function setBorderColor(Color $borderColor)
    {
        $this->borderColor = $borderColor;
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
     * @return Color
     */
    public function getColor(): Color
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
     * @return bool
     */
    public function isCrop(): bool
    {
        return $this->crop;
    }

    /**
     * @param bool $crop
     */
    public function setCrop(bool $crop)
    {
        $this->crop = $crop;
    }

    /**
     * @return bool
     */
    public function isDefer(): bool
    {
        return $this->defer;
    }

    /**
     * @param bool $defer
     */
    public function setDefer(bool $defer)
    {
        $this->defer = $defer;
    }

    /**
     * @return Filter
     */
    public function getFilter(): Filter
    {
        return $this->filter;
    }

    /**
     * @param Filter $filter
     */
    public function setFilter(Filter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return bool
     */
    public function isInside(): bool
    {
        return $this->inside;
    }

    /**
     * @param bool $inside
     */
    public function setInside(bool $inside)
    {
        $this->inside = $inside;
    }

    /**
     * @return string
     */
    public function getOverflow(): string
    {
        return $this->overflow;
    }

    /**
     * @param string $overflow
     */
    public function setOverflow(string $overflow)
    {
        $this->overflow = $overflow;
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
     * @return int
     */
    public function getRotation(): int
    {
        return $this->rotation;
    }

    /**
     * @param int $rotation
     */
    public function setRotation(int $rotation)
    {
        $this->rotation = $rotation;
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
     * @return Style
     */
    public function getStyle(): Style
    {
        return $this->style;
    }

    /**
     * @param Style $style
     */
    public function setStyle(Style $style)
    {
        $this->style = $style;
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
     * @return string
     */
    public function getVerticalAlign(): string
    {
        return $this->verticalAlign;
    }

    /**
     * @param string $verticalAlign
     */
    public function setVerticalAlign(string $verticalAlign)
    {
        $this->verticalAlign = $verticalAlign;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y)
    {
        $this->y = $y;
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
        $result = [];

        if (!is_null($this->align)) {
            $result['align'] = $this->align;
        }
        if (!is_null($this->allowOverlap)) {
            $result['allowOverlap'] = $this->allowOverlap;
        }
        if (!is_null($this->backgroundColor)) {
            $result['backgroundColor'] = (string)$this->backgroundColor;
        }
        if (!is_null($this->borderColor)) {
            $result['borderColor'] = (string)$this->borderColor;
        }
        if (!is_null($this->borderRadius)) {
            $result['borderRadius'] = $this->borderRadius;
        }
        if (!is_null($this->borderWidth)) {
            $result['borderWidth'] = $this->borderWidth;
        }
        if (!is_null($this->className)) {
            $result['className'] = $this->className;
        }
        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }
        if (!is_null($this->crop)) {
            $result['crop'] = $this->crop;
        }
        if (!is_null($this->defer)) {
            $result['defer'] = $this->defer;
        }
        if (!is_null($this->distance)) {
            $result['distance'] = $this->distance;
        }
        if (!is_null($this->enabled)) {
            $result['enabled'] = $this->enabled;
        }
        if (!is_null($this->filter)) {
            $result['filter'] = $this->filter;
        }
        if (!is_null($this->format)) {
            $result['format'] = $this->format;
        }
        if (!is_null($this->inside)) {
            $result['inside'] = $this->inside;
        }
        if (!is_null($this->overflow)) {
            $result['overflow'] = $this->overflow;
        }
        if (!is_null($this->padding)) {
            $result['padding'] = $this->padding;
        }
        if (!is_null($this->rotation)) {
            $result['rotation'] = $this->rotation;
        }
        if (!is_null($this->shadow)) {
            $result['shadow'] = $this->shadow;
        }
        if (!is_null($this->shape)) {
            $result['shape'] = $this->shape;
        }
        if (!is_null($this->style)) {
            $result['style'] = (array)$this->style;
        }
        if (!is_null($this->useHTML)) {
            $result['useHTML'] = $this->useHTML;
        }
        if (!is_null($this->verticalAlign)) {
            $result['verticalAlign'] = $this->verticalAlign;
        }
        if (!is_null($this->x)) {
            $result['x'] = $this->x;
        }
        if (!is_null($this->y)) {
            $result['y'] = $this->y;
        }
        if (!is_null($this->zIndex)) {
            $result['zIndex'] = $this->zIndex;
        }
        ksort($result);

        return $result;
    }

    /**
     * @TODO
     */
    public function formatter()
    {
        //Callback JavaScript function to format the data label. Note that if a format is defined, the format takes precedence and the formatter is ignored. Available data are:
    }
}

