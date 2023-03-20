<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\Graph\DataLabels\Filter;
use Validaide\HighChartsBundle\Graph\DataLabels\Style;
use Validaide\HighChartsBundle\ValueObject\Color;

class DataLabels
{
    final public const DEFAULT_FORMAT = "{value}";

    private ?string $align           = null;
    private ?bool   $allowOverlap    = null;
    private ?Color  $backgroundColor = null;
    private ?Color  $borderColor     = null;
    private ?int    $borderRadius    = null;
    private ?int    $borderWidth     = null;
    private ?string $className       = null;
    private ?Color  $color           = null;
    private ?bool   $crop            = null;
    private ?bool   $defer           = null;
    private ?Filter $filter          = null;
    private ?bool   $inside          = null;
    private ?string $overflow        = null;
    private ?int    $padding         = null;
    private ?int    $rotation        = null;
    private ?bool   $shadow          = null;
    private ?string $shape           = null;
    private ?Style  $style           = null;
    private ?bool   $useHTML         = null;
    private ?string $verticalAlign   = null;
    private ?int    $x               = null;
    private ?int    $y               = null;
    private ?int    $zIndex          = null;
    private ?int    $distance        = null;
    private bool    $enabled         = false;
    private ?string $format          = null;

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(?int $distance): void
    {
        $this->distance = $distance;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function setAlign(string $align): void
    {
        $this->align = $align;
    }

    public function isAllowOverlap(): bool
    {
        return $this->allowOverlap;
    }

    public function setAllowOverlap(bool $allowOverlap): void
    {
        $this->allowOverlap = $allowOverlap;
    }

    public function getBackgroundColor(): Color
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(Color $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function getBorderColor(): Color
    {
        return $this->borderColor;
    }

    public function setBorderColor(Color $borderColor): void
    {
        $this->borderColor = $borderColor;
    }

    public function getBorderRadius(): int
    {
        return $this->borderRadius;
    }

    public function setBorderRadius(int $borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }

    public function getBorderWidth(): int
    {
        return $this->borderWidth;
    }

    public function setBorderWidth(int $borderWidth): void
    {
        $this->borderWidth = $borderWidth;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function isCrop(): bool
    {
        return $this->crop;
    }

    public function setCrop(bool $crop): void
    {
        $this->crop = $crop;
    }

    public function isDefer(): bool
    {
        return $this->defer;
    }

    public function setDefer(bool $defer): void
    {
        $this->defer = $defer;
    }

    public function getFilter(): Filter
    {
        return $this->filter;
    }

    public function setFilter(Filter $filter): void
    {
        $this->filter = $filter;
    }

    public function isInside(): bool
    {
        return $this->inside;
    }

    public function setInside(bool $inside): void
    {
        $this->inside = $inside;
    }

    public function getOverflow(): string
    {
        return $this->overflow;
    }

    public function setOverflow(string $overflow): void
    {
        $this->overflow = $overflow;
    }

    public function getPadding(): int
    {
        return $this->padding;
    }

    public function setPadding(int $padding): void
    {
        $this->padding = $padding;
    }

    public function getRotation(): int
    {
        return $this->rotation;
    }

    public function setRotation(int $rotation): void
    {
        $this->rotation = $rotation;
    }

    public function isShadow(): bool
    {
        return $this->shadow;
    }

    public function setShadow(bool $shadow): void
    {
        $this->shadow = $shadow;
    }

    public function getShape(): string
    {
        return $this->shape;
    }

    public function setShape(string $shape): void
    {
        $this->shape = $shape;
    }

    public function getStyle(): Style
    {
        return $this->style;
    }

    public function setStyle(Style $style): void
    {
        $this->style = $style;
    }

    public function isUseHTML(): bool
    {
        return $this->useHTML;
    }

    public function setUseHTML(bool $useHTML): void
    {
        $this->useHTML = $useHTML;
    }

    public function getVerticalAlign(): string
    {
        return $this->verticalAlign;
    }

    public function setVerticalAlign(string $verticalAlign): void
    {
        $this->verticalAlign = $verticalAlign;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    public function getZIndex(): int
    {
        return $this->zIndex;
    }

    public function setZIndex(int $zIndex): void
    {
        $this->zIndex = $zIndex;
    }

    public function toArray(): array
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
            $result['filter'] = $this->filter->toArray();
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
    public function formatter(): void
    {
        //Callback JavaScript function to format the data label. Note that if a format is defined, the format takes precedence and the formatter is ignored. Available data are:
    }
}

