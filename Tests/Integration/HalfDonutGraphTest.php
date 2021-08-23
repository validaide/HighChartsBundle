<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Series;
use Tests\Validaide\HighChartsBundle\IntegrationTestCase;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HalfDonutGraphTest extends IntegrationTestCase
{
    const TYPE = 'pie';
    const TITLE = 'Temperature<br>Exposure';
    const CREDITS_TEXT = 'Validaide';
    const CREDITS_HREF = 'validaide.com';
    const SERIES_1_NAME = 'Temperature Exposure';

    public static function getSeriesData(int $seriesIndex = 0): array
    {
        $series[0] = [
            [
                'y' => 34.3,
                'name' => 'Not Temperature Controlled',
                'color' => 'red',
                'drilldown' => 'A',
            ],
            [
                'y' => 7.7,
                'name' => 'Unknown or Optional',
                'color' => 'orange',
            ],
            [
                'y' => 58,
                'name' => 'Temperature Controlled',
                'color' => 'green',
            ],
        ];

        return $series[$seriesIndex];
    }

    /**
     *
     */
    public function test_render()
    {
        $replacements = [
            'TYPE' => self::TYPE,
            'TITLE' => self::TITLE,
            'CREDITS_TEXT' => self::CREDITS_TEXT,
            'CREDITS_HREF' => self::CREDITS_HREF,
            'SERIES_1_NAME' => self::SERIES_1_NAME,
            'SERIES_1_DATA' => $this->prependSpaces(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 12),
        ];

        $halfDonutGraph = new HalfDonutGraph();

        $this->assertGraph($halfDonutGraph, $replacements);
    }
}

class HalfDonutGraph extends Graph
{
    public function __construct()
    {
        parent::__construct();

        // Define pie plot options
        $piePlotOptions = new Graph\PlotOptions\Pie();
        $piePlotOptions->setStartAngle(-90);
        $piePlotOptions->setCenter(['50%', '75%']);
        $piePlotOptions->setEndAngle(90);
        $piePlotOptions->setInnerSize('50%');
        $piePlotOptions->getDataLabels()->setEnabled(true);
        $piePlotOptions->getDataLabels()->setFormat('{point.percentage:.1f} %');
        $piePlotOptions->setShowInLegend(true);
        $this->setPlotOptions($piePlotOptions);

        // Define common stuff
        $this->setMargin([0, 0, 0, 0]);
        $this->setType(HalfDonutGraphTest::TYPE);
        $this->getTitle()->setText(HalfDonutGraphTest::TITLE);
        $this->getTitle()->setAlign('center');
        $this->getTitle()->setVerticalAlign('middle');
        $this->getTitle()->setY(60);

        // Legend
        $this->getLegend()->setEnabled(true);

        // Credits
        $this->getCredits()->setEnabled(true);
        $this->getCredits()->setText(HalfDonutGraphTest::CREDITS_TEXT);
        $this->getCredits()->setHref(HalfDonutGraphTest::CREDITS_HREF);

        // Main Series
        $temperatureExposureSeries = new Series(HalfDonutGraphTest::SERIES_1_NAME, HalfDonutGraphTest::getSeriesData(0));
        $this->addSeries($temperatureExposureSeries);

        $drillDownA = new Series('A', []);
        $drillDownA->setId('A');
        $drillDownB = new Series('B', []);
        $drillDownB->setId('B');

        $drillDown = new Graph\Drilldown();
        $drillDown->addSeries($drillDownA);
        $drillDown->addSeries($drillDownB);
        $this->setDrillDown($drillDown);
    }
}