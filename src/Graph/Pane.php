<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Pane
{
    // background object
    // center array

    /**
     * @var int
     */
    public $endAngle;

    /**
     * @var string
     */
    public $size;

    /**
     * @var int
     */
    public $startAngle;

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->endAngle)) {
            $result['endAngle'] = (string)$this->endAngle;
        }
        if (!is_null($this->size)) {
            $result['size'] = (string)$this->size;
        }
        if (!is_null($this->startAngle)) {
            $result['startAngle'] = (string)$this->startAngle;
        }

        return $result;
    }

}
