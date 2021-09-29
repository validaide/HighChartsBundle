<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Bar extends PlotOptions
{
    /**
     * @return array<string, array<string, bool|string>>
     */
    public function toArray(): array
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