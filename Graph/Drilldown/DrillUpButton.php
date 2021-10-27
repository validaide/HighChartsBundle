<?php

namespace Validaide\HighChartsBundle\Graph\Drilldown;

class DrillUpButton
{
    private string  $align         = 'right';
    private ?string $verticalAlign = 'top';
    private ?string $x             = null;
    private ?string $y             = null;
    private string  $relativeTo    = 'spacingBox';

    public function setAlign(string $align): void
    {
        $this->align = $align;
    }

    public function setVerticalAlign(?string $verticalAlign): void
    {
        $this->verticalAlign = $verticalAlign;
    }

    public function setX(?string $x): void
    {
        $this->x = $x;
    }

    public function setY(?string $y): void
    {
        $this->y = $y;
    }

    public function setRelativeTo(string $relativeTo): void
    {
        $this->relativeTo = $relativeTo;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->align)) {
            $result['position']['align'] = $this->align;
        }

        if (!is_null($this->verticalAlign)) {
            $result['position']['verticalAlign'] = $this->verticalAlign;
        }

        if (!is_null($this->x)) {
            $result['position']['x'] = $this->x;
        }

        if (!is_null($this->y)) {
            $result['position']['y'] = $this->y;
        }

        if (!is_null($this->relativeTo)) {
            $result['relativeTo'] = $this->relativeTo;
        }

        return $result;
    }

}
