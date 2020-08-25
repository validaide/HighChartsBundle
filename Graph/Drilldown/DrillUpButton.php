<?php

namespace Validaide\HighChartsBundle\Graph\Drilldown;

class DrillUpButton
{
    /** @var string */
    private $verticalAlign = 'top';

    /**
     * @return string|null
     */
    public function getVerticalAlign(): ?string
    {
        return $this->verticalAlign;
    }

    /**
     * @param string|null $verticalAlign
     */
    public function setVerticalAlign(?string $verticalAlign): void
    {
        $this->verticalAlign = $verticalAlign;
    }

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->verticalAlign)) {
            $result['position']['verticalAlign'] = $this->verticalAlign;
        }
        
        $result['relativeTo'] = 'spacingBox';

        return $result;
    }

}
