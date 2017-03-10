<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Axis
 */
class Axis
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $opposite;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
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
     * @return string
     */
    public function toArray()
    {
        $result = [
            'title' => [
                'text' => $this->title,
            ],
        ];

        if(!is_null($this->opposite)) {
            $result['opposite'] = $this->opposite;
        }

        return $result;
    }

}
