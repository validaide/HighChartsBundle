<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Marker
{
    public const ENABLED           = 'enabled';
    public const ENABLED_THRESHOLD = 'enabledThreshold';
    public const FILL_COLOR        = 'fillColor';
    public const HEIGHT            = 'height';
    public const LINE_COLOR        = 'lineColor';
    public const LINE_WIDTH        = 'lineWidth';
    public const RADIUS            = 'radius';
    public const SYMBOL            = 'symbol';
    public const WIDTH             = 'width';

    private ?bool   $enabled          = null;
    private ?int    $enabledThreshold = null;
    private ?Color  $fillColor        = null;
    private ?int    $height           = null;
    private ?Color  $lineColor        = null;
    private ?int    $lineWidth        = null;
    private ?int    $radius           = null;
    private ?string $symbol           = null;
    private ?int    $width            = null;

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getEnabledThreshold(): ?int
    {
        return $this->enabledThreshold;
    }

    public function setEnabledThreshold(?int $enabledThreshold): void
    {
        $this->enabledThreshold = $enabledThreshold;
    }

    public function getFillColor(): ?Color
    {
        return $this->fillColor;
    }

    public function setFillColor(?Color $fillColor): void
    {
        $this->fillColor = $fillColor;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    public function getLineColor(): ?Color
    {
        return $this->lineColor;
    }

    public function setLineColor(?Color $lineColor): void
    {
        $this->lineColor = $lineColor;
    }

    public function getLineWidth(): ?int
    {
        return $this->lineWidth;
    }

    public function setLineWidth(?int $lineWidth): void
    {
        $this->lineWidth = $lineWidth;
    }

    public function getRadius(): ?int
    {
        return $this->radius;
    }

    public function setRadius(?int $radius): void
    {
        $this->radius = $radius;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): void
    {
        $this->width = $width;
    }

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->enabled)) {
            $result[self::ENABLED] = (string)$this->enabled;
        }
        if (!is_null($this->enabledThreshold)) {
            $result[self::ENABLED_THRESHOLD] = $this->enabledThreshold;
        }
        if (!is_null($this->fillColor)) {
            $result[self::FILL_COLOR] = $this->fillColor;
        }
        if (!is_null($this->height)) {
            $result[self::HEIGHT] = $this->height;
        }
        if (!is_null($this->lineColor)) {
            $result[self::LINE_COLOR] = $this->lineColor;
        }
        if (!is_null($this->lineWidth)) {
            $result[self::LINE_WIDTH] = $this->lineWidth;
        }
        if (!is_null($this->radius)) {
            $result[self::RADIUS] = $this->radius;
        }
        if (!is_null($this->symbol)) {
            $result[self::SYMBOL] = $this->symbol;
        }
        if (!is_null($this->width)) {
            $result[self::WIDTH] = $this->width;
        }

        return $result;
    }
}
