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
    public function toArray()
    {
        return [
            'name' => $this->name,
            'data' => $this->data,
        ];
    }
}
