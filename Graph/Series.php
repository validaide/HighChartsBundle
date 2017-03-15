<?php

namespace Validaide\HighChartsBundle\Graph;

use Ivory\JsonBuilder\JsonBuilder;
use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * Class: Graph
 */
class Series
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var Color
     */
    private $color = null;

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
     * @return string
     */
    public function toArray()
    {
        $result = [
            'name' => $this->name,
        ];

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }

        if (!is_null($this->type)) {
            $result['type'] = $this->type;
        }

        if (!is_null($this->yAxis)) {
            $result['yAxis'] = $this->yAxis;
        }

        $result['data'] = $this->data;

        return $result;
    }
}
