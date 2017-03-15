<?php

namespace Validaide\HighChartsBundle\Graph;

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
    // private $color;

    /**
     * @var DashStyle
     */
    // private $dashStyle;

    // private $events;

    /**
     * @var string
     */
    private $id;

    /**
     * @var Label
     */
    // private $label;

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
     * @return string
     */
    public function toArray()
    {
        $result = [];

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
