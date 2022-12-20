<?php

namespace Validaide\HighChartsBundle\Graph\PlotOptions;

use Validaide\HighChartsBundle\Graph\PlotOptions;

class Bar extends PlotOptions
{
    /**
     * @return array<string, mixed>
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