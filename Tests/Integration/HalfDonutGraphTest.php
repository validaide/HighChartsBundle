<?php

namespace Validaide\HighChartsBundle\Tests\Integration;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Tests\IntegrationTestCase;

/**
 * Class HalfDonutGraphTest
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HalfDonutGraphTest extends IntegrationTestCase
{
    const TYPE          = 'pie';
    const TITLE         = 'Temperature Exposure';
    const CREDITS_TEXT  = 'Validaide';
    const CREDITS_HREF  = 'validaide.com';
    const SERIES_1_NAME = 'Temperature Exposure';

    /**
     * @param int $seriesIndex
     *
     * @return mixed
     */
    public static function getSeriesData($seriesIndex = 0)
    {
        $series[0] = [
            [
                'y'     => 34.3,
                'name'  => 'Not Temperature Controlled',
                'color' => 'red',
            ],
            [
                'y'     => 7.7,
                'name'  => 'Unknown or Optional',
                'color' => 'orange',
            ],
            [
                'y'     => 58,
                'name'  => 'Temperature Controlled',
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
            'TYPE'          => self::TYPE,
            'TITLE'         => self::TITLE,
            'CREDITS_TEXT'  => self::CREDITS_TEXT,
            'CREDITS_HREF'  => self::CREDITS_HREF,
            'SERIES_1_NAME' => self::SERIES_1_NAME,
            'SERIES_1_DATA' => $this->prependSpaces(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 12),
        ];

        $halfDonutGraph = new HalfDonutGraph();

        $this->assertGraph($halfDonutGraph, $replacements);
    }
}

/**
 * Class HalfDonutGraph
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HalfDonutGraph extends Graph
{
    /**
     * HalfDonutGraph constructor.
     */
    public function __construct()
    {
        parent::__construct();

        // Define pie plot options
        $piePlotOptions = new Graph\PlotOptions\Pie();
        $piePlotOptions->setStartAngle(-90);
        $piePlotOptions->setCenter(['50%','75%']);
        $piePlotOptions->setEndAngle(90);
        $piePlotOptions->setInnerSize('50%');
        $piePlotOptions->getDataLabels()->setEnabled(true);
        $piePlotOptions->getDataLabels()->setFormat('{point.percentage:.1f} %');
        $piePlotOptions->setShowInLegend(true);
//        $piePlotOptions->getDataLabels()->setDistance(-30);
        $this->setPlotOptions($piePlotOptions);

        $this->getLegend()->setEnabled(true);

        // Define common stuff
        $this->setType(HalfDonutGraphTest::TYPE);
        $this->getTitle()->setText(HalfDonutGraphTest::TITLE);

        // Credits
        $this->getCredits()->setEnabled(true);
        $this->getCredits()->setText(HalfDonutGraphTest::CREDITS_TEXT);
        $this->getCredits()->setHref(HalfDonutGraphTest::CREDITS_HREF);

        $temperatureExposureSeries = new Series(HalfDonutGraphTest::SERIES_1_NAME, HalfDonutGraphTest::getSeriesData(0));

        $this->addSeries($temperatureExposureSeries);
    }
}