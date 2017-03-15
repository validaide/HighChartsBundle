<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;
use Validaide\HighChartsBundle\ValueObject\DashStyle;

/**
 * Class: PlotLine
 */
class PlotLine
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var Color
     */
    private $color;

    /**
     * @var DashStyle
     */
    private $dashStyle;

    // private $events;

    /**
     * @var string
     */
    private $id;

    /**
     * @var Label
     */
    private $label;

    /**
     * @var int
     */
    private $value;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $zIndex;

    public function __construct()
    {
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
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value)
    {
        $this->value = $value;
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
     * @return Label
     */
    public function getLabel(): Label
    {
        if (is_null($this->label)) {
            $this->label = new Label();
        }

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
     * @return string
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }
        if (!is_null($this->dashStyle)) {
            $result['dashStyle'] = (string)$this->dashStyle;
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
