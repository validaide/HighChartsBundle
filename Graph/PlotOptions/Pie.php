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
 * Class: Pie
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Pie extends PlotOptions
{
    /**
     * @return array
     */
    public function toArray()
    {
        $result['pie'] = [];

        if (!is_null($this->color)) {
            $result['pie']['series']['color'] = $this->color;
        }

        if (!is_null($this->allowPointSelect)) {
            $result['pie']['series']['allowPointSelect'] = $this->allowPointSelect;
        }

        return $result;
    }
}