<?php

namespace Validaide\HighChartsBundle\Graph;

use Ivory\JsonBuilder\JsonBuilder;

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
     * @var string|null
     */
    private $color = null;

    /**
     * @var string|null
     */
    private $type = null;

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
     * @return null|string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param null|string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function toArray()
    {
        $result = [
            'name' => $this->name,
            'data' => $this->data,
        ];

        if (!is_null($this->color)) {
            $result['color'] = $this->color;
        }

        if (!is_null($this->type)) {
            $result['type'] = $this->type;
        }

        return $result;
    }

}
