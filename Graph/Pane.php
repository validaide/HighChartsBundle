<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Pane
{
    public ?int    $startAngle = null;
    public ?int    $endAngle   = null;
    public ?string $size       = null;

    /**
     * @return array<string, string>
     */
    public function toArray(): array
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
