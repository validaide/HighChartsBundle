<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Marker
{
    const ENABLED           = 'enabled';
    const ENABLED_THRESHOLD = 'enabledThreshold';
    const FILL_COLOR        = 'fillColor';
    const HEIGHT            = 'height';
    const LINE_COLOR        = 'lineColor';
    const LINE_WIDTH        = 'lineWidth';
    const RADIUS            = 'radius';
    const SYMBOL            = 'symbol';
    const WIDTH             = 'width';

    /** @var null|bool */
    private $enabled;

    /** @var int */
    private $enabledThreshold;

    /** @var null|Color */
    private $fillColor;

    /** @var null|int */
    private $height;

    /** @var Color */
    private $lineColor;

    /** @var int */
    private $lineWidth;

    /** @var int */
    private $radius;

    /** @var string */
    private $symbol;

    /** @var int */
    private $width;

    /**
     * Marker constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return bool|null
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool|null $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return int
     */
    public function getEnabledThreshold(): int
    {
        return $this->enabledThreshold;
    }

    /**
     * @param int $enabledThreshold
     */
    public function setEnabledThreshold(int $enabledThreshold)
    {
        $this->enabledThreshold = $enabledThreshold;
    }

    /**
     * @return null|Color
     */
    public function getFillColor(): Color
    {
        return $this->fillColor;
    }

    /**
     * @param null|Color $fillColor
     */
    public function setFillColor(Color $fillColor)
    {
        $this->fillColor = $fillColor;
    }

    /**
     * @return int|null
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return Color
     */
    public function getLineColor(): Color
    {
        return $this->lineColor;
    }

    /**
     * @param Color $lineColor
     */
    public function setLineColor(Color $lineColor)
    {
        $this->lineColor = $lineColor;
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
     * @return int
     */
    public function getRadius(): int
    {
        return $this->radius;
    }

    /**
     * @param int $radius
     */
    public function setRadius(int $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @return array
     */
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
