<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use Validaide\HighChartsBundle\Graph\PlotOptions\Spline;
use Validaide\HighChartsBundle\Graph\Tooltip;
use Validaide\HighChartsBundle\Graph\DataLabels;
use Tests\Validaide\HighChartsBundle\IntegrationTestCase;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\Label;
use Validaide\HighChartsBundle\Graph\PlotBand;
use Validaide\HighChartsBundle\Graph\PlotLine;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\ValueObject\Color;
use Validaide\HighChartsBundle\ValueObject\HorizontalAlignment;

class SplineGraphTest extends IntegrationTestCase
{
    public const TYPE            = 'spline';
    public const TITLE           = 'TITLE';
    public const Y_AXIS_TITLE    = 'YYYYYY';
    public const X_AXIS_TITLE    = 'XXXXXX';
    public const SERIES_1_NAME   = 'SERIES';
    public const SERIES_1_Y_AXIS = 0;

    public static function getSeriesData(int $seriesIndex = 1): array
    {
        $series = [];
        $series[0] = [0, 1, 2, 3, 4, 5];
        $series[1] = [0, 1, 2, 3, 4, 5];

        return $series[$seriesIndex];
    }

    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    /**
     *
     */
    public function test_render()
    {
        // NOTE: https://bugs.php.net/bug.php?id=72567
        // Required for PHP 7.1 json_encode float precision
        ini_set('serialize_precision', 14);

        $replacements = [
            'TYPE'            => self::TYPE,
            'TITLE'           => self::TITLE,
            'X_AXIS_TITLE'    => self::X_AXIS_TITLE,
            'Y_AXIS_TITLE'    => self::Y_AXIS_TITLE,
            'SERIES_1_NAME'   => self::SERIES_1_NAME,
            'SERIES_1_Y_AXIS' => self::SERIES_1_Y_AXIS,
            'SERIES_1_DATA'   => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
        ];

        $climateGraph = new SplineGraph();

        $this->assertTrue(true);
        $this->assertGraph($climateGraph, $replacements);
    }
}

class SplineGraph extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $splinePlotOptions = new Spline();
        $splinePlotOptions->setStacking(Spline::STACKING_NORMAL);
        $this->setPlotOptions($splinePlotOptions);

        $this->setType(SplineGraphTest::TYPE);
        $this->setPlotShadow(false);
        $this->getTitle()->setText(SplineGraphTest::TITLE);
        $this->getLegend()->setEnabled(true);

        $tooltip = new Tooltip();
        $tooltip->setBackgroundColor(new Color('#FFFFFFF'));
        $tooltip->setSplit(true);
        $tooltip->setBorderRadius(5);
        $this->setTooltip($tooltip);

        // Plotbands, Plotlines

        $YPlotBand = new PlotBand();
        $YPlotBand->setId('plot_band_y');
        $YPlotBand->setFrom(2);
        $YPlotBand->setTo(4);
        $YPlotBand->setColor(new Color('#FFEEEE'));
        $YPlotBand->setBorderColor(new Color('#FFFFFFF'));
        $YPlotBand->setBorderWidth(1);

        $YLabel = new Label();
        $YLabel->setText('LABEL HERE');
        $YLabel->setRotation(90);
        $YLabel->setAlign(new HorizontalAlignment('right'));
        $YPlotBand->setLabel($YLabel);

        $YPlotLine = new PlotLine();
        $YPlotLine->setId('plot_lineY');
        $YPlotLine->setZIndex(2);
        $YPlotLine->setWidth(3);
        $YPlotLine->setColor(new Color('#FF0000'));
        $YPlotLine->setValue(5.5);

        $this->initXAxis();

        // yAxis
        $yAxis = new Axis();
        $yAxis->getTitle()->setText(SplineGraphTest::Y_AXIS_TITLE);
        $yAxis->addPlotBand($YPlotBand);
        $yAxis->addPlotLine($YPlotLine);
        $this->addYAxis($yAxis);

        $this->initSeries();
    }

    private function initSeries()
    {
        $seriesPlotOne = new Series(SplineGraphTest::SERIES_1_NAME, SplineGraphTest::getSeriesData(0));
        $seriesPlotOne->setType('line');
        $seriesPlotOne->setYAxis(SplineGraphTest::SERIES_1_Y_AXIS);
        $seriesPlotOne->setColor(new Color('#0000FF'));
        $dataLabels = new DataLabels();
        $dataLabels->setEnabled(true);
        $dataLabels->setBorderWidth(3);
        $dataLabels->setBorderColor(new Color('#AAA'));
        $seriesPlotOne->setDataLabels($dataLabels);


        $this->addSeries($seriesPlotOne);
    }

    private function initXAxis()
    {
        // xAxis
        $this->getXAxis()->getTitle()->setText(SplineGraphTest::X_AXIS_TITLE);
        $this->getXAxis()->setCrosshair(true);

        // Plot Bands
        $XPlotBand = new PlotBand();
        $XPlotBand->setId('plot_band_x');
        $XPlotBand->setFrom(2);
        $XPlotBand->setTo(4);
        $XPlotBand->setColor(new Color('#FFEEEE'));
        $XPlotBand->setZIndex(2);
        $XPlotBand->setBorderColor(new Color('#FFFFFFF'));

        $this->getXAxis()->addPlotBand($XPlotBand);

        // Plot Lines

        $plotLine = new PlotLine();
        $plotLine->getLabel()->setText('X-AXIS Plot Line');
        $plotLine->setZIndex(10);
        $plotLine->setColor(new Color('#FF0000'));
        $plotLine->setValue(1);
        $plotLine->setWidth(2);

        $this->getXAxis()->addPlotLine($plotLine);
    }
}
