<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\Graph\Drilldown\DrillUpButton;

/**
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Drilldown
{
    /** @var DrillUpButton */
    private $drillUpButton;
    /** @var Series[]|array */
    private $series = [];

    /**
     * I am a constructor bot *BEEP* *BOOP*
     */
    public function __construct()
    {
        $this->drillUpButton = new DrillUpButton();
        $this->series = [];
    }

    /**
     * @return DrillUpButton
     */
    public function getDrillUpButton(): DrillUpButton
    {
        return $this->drillUpButton;
    }

    /**
     * @param Series $series
     */
    public function addSeries(Series $series): void
    {
        $this->series[] = $series->toArray();
    }

    /**
     * @return array|Series[]
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return array
     */
    public function toArray()
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
