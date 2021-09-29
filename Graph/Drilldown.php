<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\Graph\Drilldown\DrillUpButton;

/**
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Drilldown
{
    private DrillUpButton $drillUpButton;
    /** @var Series[]|array */
    private array $series = [];

    /**
     * I am a constructor bot *BEEP* *BOOP*
     */
    public function __construct()
    {
        $this->drillUpButton = new DrillUpButton();
        $this->series = [];
    }

    public function getDrillUpButton(): DrillUpButton
    {
        return $this->drillUpButton;
    }

    public function addSeries(Series $series): void
    {
        $this->series[] = $series->toArray();
    }

    /**
     * @return array|Series[]
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
            $result['series'] = $this->series;
        }

        ksort($result);

        return $result;
    }
}
