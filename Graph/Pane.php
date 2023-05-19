<?php

namespace Validaide\HighChartsBundle\Graph;

class Pane
{
    public ?int    $startAngle = null;
    public ?int    $endAngle   = null;
    public ?string $size       = null;
    public ?string $background = null;
    public ?array  $center     = null;

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->startAngle)) {
            $result['startAngle'] = $this->startAngle;
        }
        if (!is_null($this->endAngle)) {
            $result['endAngle'] = $this->endAngle;
        }
        if (!is_null($this->size)) {
            $result['size'] = (string)$this->size;
        }
        if (!is_null($this->center)) {
            $result['center'] = $this->center;
        }

        $result['background'] = $this->background;

        return $result;
    }
}