<?php

namespace Validaide\HighChartsBundle\Tests\Integration;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\PlotLine;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use PHPUnit\Framework\TestCase;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class ClimateGraphTest extends TestCase
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
    const SERIES_2_Y_AXIS          = 1;

    public static function getXAxisCategories()
    {
        $months = [];
        for ($m = 1; $m <= 12; $m++) {
            $months[] = date('M', mktime(0, 0, 0, $m));
        }

        return $months;
    }

    public static function getSeriesData($seriesIndex = 1)
    {
        $series[0] = [5, 7, 8, 9, 10, 9, 8, 7, 6, 5, 4, 4];
        $series[1] = [15, 17, 18, 19, 20, 19, 18, 17, 16, 15, 14, 14];

        return $series[$seriesIndex];
    }

    public function test_render()
    {
        $graphRenderer = new GraphRenderer();

        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'ClimateGraphTest.txt');

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
            'SERIES_1_DATA'            => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
            'SERIES_2_DATA'            => $this->traverse(json_encode(self::getSeriesData(1), JSON_PRETTY_PRINT), 16),
        ];

        foreach ($replacements as $search => $replacement) {
            $expected = str_replace('[' . $search . ']', $replacement, $expected);
        }

        file_put_contents('climate_graph_test_expected.txt', $expected);
        file_put_contents('climate_graph_test_rendered.txt', $graphRenderer->render(new ClimateGraph()));

        $this->assertSame(
            $expected,
            $graphRenderer->render(new ClimateGraph())
        );
    }

    protected function traverse($input, $repeat = 1)
    {
        $result    = '';
        $lineCount = 0;
        $numLines  = count(preg_split('/\n|\r/', $input));
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $input) as $line) {
            $lineCount++;
            if ($lineCount == 1) {
                $result .= $line . "\n";
                continue;
            }
            if ($lineCount == $numLines) {
                $result .= $this->prependSpaces($line, $repeat - 4);
                continue;
            }

            $line = trim($line);
            $result .= $this->prependSpaces($line, $repeat) . "\n";
        }

        return $result;
    }

    public function prependSpaces($input, $repeat = 1)
    {
        for ($count = 0; $count < $repeat; $count++) {
            $input = " " . $input;
        }

        return $input;
    }
}

class ClimateGraph extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(ClimateGraphTest::TYPE);
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
        $maxTempPlotLine = new PlotLine();
        $maxTempPlotLine->setValue(max(ClimateGraphTest::getSeriesData(0)));
        $minTempPlotLine = new PlotLine();
        $minTempPlotLine->setValue(min(ClimateGraphTest::getSeriesData(0)));
        $this->getXAxis()->addPlotLine($maxTempPlotLine);
        $this->getXAxis()->addPlotLine($minTempPlotLine);

        // yAxis
        $yAxisTemp = new Axis();
        $yAxisTemp->getTitle()->setText(ClimateGraphTest::Y_AXIS_TEMPERATURE_TITLE);
        $yAxisTemp->setOpposite(true);
        $yAxisTemp->labels->setFormat('{value}°C');
        $yAxisRainfall = new Axis();
        $yAxisRainfall->getTitle()->setText(ClimateGraphTest::Y_AXIS_RAINFALL_TITLE);
        $yAxisRainfall->labels->setFormat('{value} mm');

        $this->addYAxis($yAxisTemp);
        $this->addYAxis($yAxisRainfall);

        $tempSeries = new Series(ClimateGraphTest::SERIES_1_NAME, ClimateGraphTest::getSeriesData(0));
        $tempSeries->setYAxis(ClimateGraphTest::SERIES_1_Y_AXIS);
        $rainSeries = new Series(ClimateGraphTest::SERIES_2_NAME, ClimateGraphTest::getSeriesData(1));
        $rainSeries->setYAxis(ClimateGraphTest::SERIES_2_Y_AXIS);

        $this->addSeries($tempSeries);
        $this->addSeries($rainSeries);
    }
}