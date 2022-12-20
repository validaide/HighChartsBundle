<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\Graph\Drilldown\DrillUpButton;

class Drilldown
{
    private DrillUpButton $drillUpButton;
    /** @var Series[] */
    private array $series = [];

    public function __construct()
    {
        $this->drillUpButton = new DrillUpButton();
    }

    public function getDrillUpButton(): DrillUpButton
    {
        return $this->drillUpButton;
    }

    public function addSeries(Series $series): void
    {
        $this->series[] = $series;
    }

    /**
     * @return Series[]
     */
    public function getSeries(): array
    {
        return $this->series;
    }

    /**
     * @return array<string, mixed[]>
     */
    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->drillUpButton)) {
            $result['drillUpButton'] = $this->drillUpButton->toArray();
        }

        if (!is_null($this->series)) {
            $seriesData = [];

            foreach ($this->series as $series) {
                $seriesData[] = $series->toArray();
            }

            $result['series'] = $seriesData;
        }

        ksort($result);

        return $result;
    }
}
