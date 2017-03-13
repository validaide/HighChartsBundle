<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Axis
 */
class Axis
{
    /**
     * @var Title
     */
    private $title;

    /**
     * @var bool
     */
    private $opposite;

    /**
     * @var bool
     */
    private $crosshair;

    /**
     * @var array|null
     */
    private $categories = null;

    /**
     * @var Labels
     */
    public $labels;

    public function __construct()
    {
        $this->title  = new Title();
        $this->labels = new Labels();
    }

    /**
     * @return Title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param Title $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function getOpposite(): bool
    {
        return $this->opposite;
    }

    /**
     * @param bool $opposite
     */
    public function setOpposite(bool $opposite)
    {
        $this->opposite = $opposite;
    }

    /**
     * @return bool
     */
    public function isCrosshair(): bool
    {
        return $this->crosshair;
    }

    /**
     * @param bool $crosshair
     */
    public function setCrosshair(bool $crosshair)
    {
        $this->crosshair = $crosshair;
    }

    /**
     * @return array|null
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array|null $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->title)) {
            $result['title'] = $this->title->toArray();
        }

        if (!is_null($this->labels)) {
            $result['labels'] = $this->labels->toArray();
        }

        if (!is_null($this->opposite)) {
            $result['opposite'] = $this->opposite;
        }

        if (!is_null($this->categories)) {
            $result['categories'] = $this->categories;
        }

        if (!is_null($this->crosshair)) {
            $result['crosshair'] = $this->crosshair;
        }

        return $result;
    }
}
