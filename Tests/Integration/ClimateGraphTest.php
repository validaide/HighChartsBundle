<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use Tests\Validaide\HighChartsBundle\IntegrationTestCase;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\PlotBand;
use Validaide\HighChartsBundle\Graph\PlotLine;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\ValueObject\Color;
use Validaide\HighChartsBundle\ValueObject\DashStyle;
use Validaide\HighChartsBundle\ValueObject\HorizontalAlignment;
use Validaide\HighChartsBundle\ValueObject\VerticalAlignment;

/**
 * Class ClimateGraphTest
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class ClimateGraphTest extends IntegrationTestCase
{
    const TYPE                     = 'column';
    const TITLE                    = 'Climate Graph: Rio de Janeiro';
    const CREDITS_TEXT             = 'Validaide';
    const CREDITS_HREF             = 'validaide.com';
    const Y_AXIS_TEMPERATURE_TITLE = 'Temperature';
    const Y_AXIS_RAINFALL_TITLE    = 'Rainfall (mm)';
    const X_AXIS_TITLE             = 'Months';
    const SERIES_1_NAME            = 'Minimum Temperature';
    const SERIES_1_Y_AXIS          = 0;
    const SERIES_2_NAME            = 'Maximum Temperature';
    const SERIES_2_Y_AXIS          = 0;
    const SERIES_3_NAME            = 'Rainfall';
    const SERIES_3_Y_AXIS          = 1;

    /**
     * @return array
     */
    public static function getXAxisCategories()
    {
        $months = [];
        for ($m = 1; $m <= 12; $m++) {
            $months[] = date('M', mktime(0, 0, 0, $m));
        }

        return $months;
    }

    /**
     * @param int $seriesIndex
     *
     * @return mixed
     */
    public static function getSeriesData($seriesIndex = 1)
    {
        $series[0] = [5.2, 7.3434, 8.23, 9.976967, 10.8678, 9.75, 8.3453, 7.56, 6.345, 5.345, 4.75685, 4.45];
        $series[1] = [15.678, 17.5, 18.45, 19.247, 20.74645, 19.254, 18.234, 17.678, 16.456, 15.94564, 14.5636, 14.743];
        $series[2] = [100, 80, 60, 20, 20, 19, 20, 60, 60, 80, 90, 100];

        return $series[$seriesIndex];
    }

    /**
     *
     */
    public function test_render()
    {
        // NOTE: https://bugs.php.net/bug.php?id=72567
        // Required for PHP 7.1 json_encode float precision
        ini_set('serialize_precision', 14);

        $replacements = [
            'TYPE'                     => self::TYPE,
            'TITLE'                    => self::TITLE,
            'CREDITS_TEXT'             => self::CREDITS_TEXT,
            'CREDITS_HREF'             => self::CREDITS_HREF,
            'X_AXIS_TITLE'             => self::X_AXIS_TITLE,
            'X_AXIS_CATEGORIES'        => $this->traverse(json_encode(self::getXAxisCategories(), JSON_PRETTY_PRINT), 12),
            'Y_AXIS_TEMPERATURE_TITLE' => self::Y_AXIS_TEMPERATURE_TITLE,
            'Y_AXIS_RAINFALL_TITLE'    => self::Y_AXIS_RAINFALL_TITLE,
            'SERIES_1_NAME'            => self::SERIES_1_NAME,
            'SERIES_1_Y_AXIS'          => self::SERIES_1_Y_AXIS,
            'SERIES_2_NAME'            => self::SERIES_2_NAME,
            'SERIES_2_Y_AXIS'          => self::SERIES_2_Y_AXIS,
            'SERIES_3_NAME'            => self::SERIES_3_NAME,
            'SERIES_3_Y_AXIS'          => self::SERIES_3_Y_AXIS,
            'SERIES_2_VISIBLE'         => "false",
            'SERIES_1_DATA'            => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
            'SERIES_2_DATA'            => $this->traverse(json_encode(self::getSeriesData(1), JSON_PRETTY_PRINT), 16),
            'SERIES_3_DATA'            => $this->traverse(json_encode(self::getSeriesData(2), JSON_PRETTY_PRINT), 16),
        ];

        $climateGraph = new ClimateGraph();

        $this->assertGraph($climateGraph, $replacements);
    }
}

/**
 * Class ClimateGraph
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class ClimateGraph extends Graph
{
    /**
     * ClimateGraph constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setType(ClimateGraphTest::TYPE);
        $this->setPlotShadow(false);
        $this->getTitle()->setText(ClimateGraphTest::TITLE);

        // Credits
        $this->getCredits()->setEnabled(true);
        $this->getCredits()->setText(ClimateGraphTest::CREDITS_TEXT);
        $this->getCredits()->setHref(ClimateGraphTest::CREDITS_HREF);

        // Tooltip
        $this->tooltip->setShared(true);

        // xAxis
        $this->getXAxis()->getTitle()->setText(ClimateGraphTest::X_AXIS_TITLE);
        $this->getXAxis()->setCategories(ClimateGraphTest::getXAxisCategories());
        $this->getXAxis()->setCrosshair(true);

        // Define maximums
        $maxTemp     = max(array_merge(ClimateGraphTest::getSeriesData(0), ClimateGraphTest::getSeriesData(1)));
        $minTemp     = min(array_merge(ClimateGraphTest::getSeriesData(0), ClimateGraphTest::getSeriesData(1)));
        $maxRainfall = max(ClimateGraphTest::getSeriesData(2));
        $minRainfall = 0;

        // Plotbands
        $tempRangePlotBand = new PlotBand();
        $tempRangePlotBand->setId('plot_band_temp_range');
        $tempRangePlotBand->setFrom(2);
        $tempRangePlotBand->setTo(25);
        $tempRangePlotBand->setColor(new Color('#FFEEEE'));

        // Plotlines
        $maxTempPlotLine = new PlotLine();
        $maxTempPlotLine->setId('plot_line_max');
        $maxTempPlotLine->setValue($maxTemp);
        $maxTempPlotLine->setWidth(1);
        $maxTempPlotLine->setColor(new Color("#FF0000"));
        $maxTempPlotLine->setDashStyle(new DashStyle(DashStyle::DASH_STYLE_SOLID));
        $maxTempPlotLine->setZIndex(4);
        $maxTempPlotLine->setClassName('class-temperature-max');
        $maxTempPlotLine->getLabel()->setText('MAX');
        $maxTempPlotLine->getLabel()->setAlign(new HorizontalAlignment(HorizontalAlignment::ALIGN_RIGHT));
        $maxTempPlotLine->getLabel()->setTextAlignment(new HorizontalAlignment(HorizontalAlignment::ALIGN_RIGHT));
        $maxTempPlotLine->getLabel()->setUseHtml(false);
        $maxTempPlotLine->getLabel()->setVerticalAlignment(new VerticalAlignment(VerticalAlignment::ALIGN_BOTTOM));
        $maxTempPlotLine->getLabel()->setX(0);
        $maxTempPlotLine->getLabel()->setY(0);
        $minTempPlotLine = new PlotLine();
        $minTempPlotLine->setId('plot_line_min');
        $minTempPlotLine->setValue($minTemp);
        $minTempPlotLine->setWidth(1);
        $minTempPlotLine->setColor(new Color("#0000FF"));
        $minTempPlotLine->setDashStyle(new DashStyle(DashStyle::DASH_STYLE_DOT));
        $minTempPlotLine->setZIndex(5);
        $minTempPlotLine->setClassName('class-temperature-min');
        $minTempPlotLine->getLabel()->setText('MIN');
        $minTempPlotLine->getLabel()->setAlign(new HorizontalAlignment(HorizontalAlignment::ALIGN_LEFT));
        $minTempPlotLine->getLabel()->setTextAlignment(new HorizontalAlignment(HorizontalAlignment::ALIGN_LEFT));
        $minTempPlotLine->getLabel()->setUseHtml(false);
        $minTempPlotLine->getLabel()->setVerticalAlignment(new VerticalAlignment(VerticalAlignment::ALIGN_TOP));

        // yAxis
        $yAxisTemp = new Axis();
        $yAxisTemp->getTitle()->setText(ClimateGraphTest::Y_AXIS_TEMPERATURE_TITLE);
        $yAxisTemp->setAlignTicks(true);
        $yAxisTemp->setEndOnTick(true);
        $yAxisTemp->setOpposite(true);
        $yAxisTemp->setMin($minTemp);
        $yAxisTemp->setMax($maxTemp);
        $yAxisTemp->labels->setFormat('{value}°C');
        // yAxis PlotBands
        $yAxisTemp->addPlotBand($tempRangePlotBand);
        // yAxis PlotLines
        $yAxisTemp->addPlotLine($maxTempPlotLine);
        $yAxisTemp->addPlotLine($minTempPlotLine);

        $yAxisRainfall = new Axis();
        $yAxisRainfall->getTitle()->setText(ClimateGraphTest::Y_AXIS_RAINFALL_TITLE);
        $yAxisRainfall->setMin($minRainfall);
        $yAxisRainfall->setMax($maxRainfall);
        $yAxisRainfall->labels->setFormat('{value} mm');

        $this->addYAxis($yAxisTemp);
        $this->addYAxis($yAxisRainfall);

        $tempSeriesMax = new Series(ClimateGraphTest::SERIES_1_NAME, ClimateGraphTest::getSeriesData(0));
        $tempSeriesMax->setType('line');
        $tempSeriesMax->setYAxis(ClimateGraphTest::SERIES_1_Y_AXIS);
        $tempSeriesMax->setColor(new Color('#0000FF'));
        $tempSeriesMax->setZIndex(1000);
        $tempSeriesMax->getMarker()->setEnabled(false);
        $tempSeriesMin = new Series(ClimateGraphTest::SERIES_2_NAME, ClimateGraphTest::getSeriesData(1));
        $tempSeriesMin->setType('line');
        $tempSeriesMin->setYAxis(ClimateGraphTest::SERIES_2_Y_AXIS);
        $tempSeriesMin->setColor(new Color('#FF0000'));
        $tempSeriesMin->setVisible(false);
        $rainSeries = new Series(ClimateGraphTest::SERIES_3_NAME, ClimateGraphTest::getSeriesData(2));
        $rainSeries->setYAxis(ClimateGraphTest::SERIES_3_Y_AXIS);
        $rainSeries->setColor(new Color('lightblue'));

        $this->addSeries($tempSeriesMax);
        $this->addSeries($tempSeriesMin);
        $this->addSeries($rainSeries);
    }
}