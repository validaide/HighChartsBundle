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
     * @return string
     */
    public function toArray()
    {
        return [
            'name' => $this->name,
            'data' => $this->data,
        ];
    }
}
