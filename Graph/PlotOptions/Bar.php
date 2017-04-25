<?php
/**
 * File: Bar.php
 * Date: 20/04/17
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@valdaide.com>
 * @link     http://www.valdaide.com
 */

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * Class: Bar
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Bar extends PlotOptions
{
    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->color)) {
            $result['series']['color'] = $this->color;
        }

        if (!is_null($this->allowPointSelect)) {
            $result['series']['allowPointSelect'] = $this->allowPointSelect;
        }

        return $result;
    }
}