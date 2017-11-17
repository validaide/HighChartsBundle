<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * Class: Graph
 */
class Series
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var Color
     */
    private $color = null;

    /**
     * @var string
     */
    private $drilldown = null;

    /**
     * @var string
     */
    private $innerSize = null;

    /**
     * @var string|null
     */
    private $type = null;

    /**
     * @var int|null
     */
    private $yAxis = null;

    /**
     * @var array|null
     */
    private $data = null;

    /**
     * @var null
     */
    private $tooltip = null;

    /**
     * @var true
     */
    private $visible = true;

    /**
     * Series constructor.
     *
     * @param $name
     * @param $data
     */
    public function __construct($name, $data)
    {
        $this->name = $name;
        $this->data = $data;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getDrilldown()
    {
        return $this->drilldown;
    }

    /**
     * @param string $drilldown
     */
    public function setDrilldown(string $drilldown)
    {
        $this->drilldown = $drilldown;
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
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array|null
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * @param array|null $tooltip
     */
    public function setTooltip($tooltip)
    {
        $this->tooltip = $tooltip;
    }

    /**
     * @return string
     */
    public function getInnerSize(): string
    {
        return $this->innerSize;
    }

    /**
     * @param string $innerSize
     */
    public function setInnerSize(string $innerSize)
    {
        $this->innerSize = $innerSize;
    }

    /**
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return null|Color
     */
    public function getColor()
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
     * @return int|null
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param int|null $yAxis
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;
    }

    /**
     * @return bool
     */
    public function getVisible(): bool
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
     * @return array
     */
    public function toArray()
    {
        $result = [
            'name' => $this->name,
        ];

        if (!is_null($this->id)) {
            $result['id'] = $this->id;
        }

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }

        if (!is_null($this->drilldown)) {
            $result['drilldown'] = $this->drilldown;
        }

        if (!is_null($this->type)) {
            $result['type'] = $this->type;
        }

        if (!is_null($this->yAxis)) {
            $result['yAxis'] = $this->yAxis;
        }

        if (!is_null($this->innerSize)) {
            $result['innerSize'] = $this->innerSize;
        }

        if (!is_null($this->tooltip)) {
            $result['tooltip'] = $this->tooltip;
        }

        $result['visible'] = $this->visible;
        $result['data']    = $this->data;

        return $result;
    }
}
