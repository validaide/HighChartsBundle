<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;
use Validaide\HighChartsBundle\ValueObject\DashStyle;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class PlotLine
{
    private ?float     $value     = null;
    private ?Label     $label     = null;
    private ?string    $className = null;
    private ?Color     $color     = null;
    private ?DashStyle $dashStyle = null;
    private ?string    $id        = null;
    private ?int       $width     = null;
    private ?int       $zIndex    = null;

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function getZIndex(): int
    {
        return $this->zIndex;
    }

    public function setZIndex(int $zIndex): void
    {
        $this->zIndex = $zIndex;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function getDashStyle(): DashStyle
    {
        return $this->dashStyle;
    }

    public function setDashStyle(DashStyle $dashStyle): void
    {
        $this->dashStyle = $dashStyle;
    }

    public function getLabel(): Label
    {
        if (is_null($this->label)) {
            $this->label = new Label();
        }

        return $this->label;
    }

    public function setLabel(Label $label): void
    {
        $this->label = $label;
    }

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }
        if (!is_null($this->className)) {
            $result['className'] = $this->className;
        }
        if (!is_null($this->dashStyle)) {
            $result['dashStyle'] = (string)$this->dashStyle;
        }
        if (!is_null($this->id)) {
            $result['id'] = $this->id;
        }
        if (!is_null($this->label)) {
            $result['label'] = $this->label->toArray();
        }
        if (!is_null($this->value)) {
            $result['value'] = $this->value;
        }
        if (!is_null($this->width)) {
            $result['width'] = $this->width;
        }
        if (!is_null($this->zIndex)) {
            $result['zIndex'] = $this->zIndex;
        }

        return $result;
    }
}
