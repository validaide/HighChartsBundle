<?php

namespace Validaide\HighChartsBundle\Graph\Drilldown;

class DrillUpButton
{
    /** @var string */
    private $align = 'right';
    /** @var string */
    private $verticalAlign = 'top';
    /** @var string|null */
    private $x;
    /** @var string|null */
    private $y;
    /** @var string */
    private $relativeTo = 'spacingBox';

    /**
     * @param string $align
     */
    public function setAlign(string $align): void
    {
        $this->align = $align;
    }

    /**
     * @param string|null $verticalAlign
     */
    public function setVerticalAlign(?string $verticalAlign): void
    {
        $this->verticalAlign = $verticalAlign;
    }

    /**
     * @param string|null $x
     */
    public function setX(?string $x): void
    {
        $this->x = $x;
    }

    /**
     * @param string|null $y
     */
    public function setY(?string $y): void
    {
        $this->y = $y;
    }

    /**
     * @param string $relativeTo
     */
    public function setRelativeTo(string $relativeTo): void
    {
        $this->relativeTo = $relativeTo;
    }


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
