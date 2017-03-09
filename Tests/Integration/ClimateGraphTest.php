<?php

namespace Validaide\HighChartsBundle\Tests\Integration;

use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use PHPUnit\Framework\TestCase;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class ClimateGraphTest extends TestCase
{
    const TYPE          = 'column';
    const TITLE         = 'Climate Graph: Rio de Janeiro';
    const Y_AXIS_TITLE  = 'Temperature';
    const X_AXIS_TITLE  = 'Months';
    const SERIES_1_NAME = 'Minimum Temperature';
    const SERIES_2_NAME = 'Maximum Temperature';

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

        $expected = <<<'EOF'
<div id="graph_container" style="width:100%;height:400px;"></div>
<script type="text/javascript">
$(function () {
var graph = Highcharts.chart("graph_container", 
{
    "chart": {
        "type": "[TYPE]"
    },
    "title": {
        "text": "[TITLE]"
    },
    "xAxis": {
        "title": {
            "text": "[X_AXIS_TITLE]"
        },
        "categories": [X_AXIS_CATEGORIES]
    },
    "yAxis": {
        "title": {
            "text": "[Y_AXIS_TITLE]"
        }
    },
    "series": [
        {
            "name": "[SERIES_1_NAME]",
            "data": [SERIES_1_DATA]
        },
        {
            "name": "[SERIES_2_NAME]",
            "data": [SERIES_2_DATA]
        }
    ]
}
);
});
</script>
EOF;

        $replacements = [
            'TYPE'              => self::TYPE,
            'TITLE'             => self::TITLE,
            'X_AXIS_TITLE'      => self::X_AXIS_TITLE,
            'X_AXIS_CATEGORIES' => $this->traverse(json_encode(self::getXAxisCategories(), JSON_PRETTY_PRINT), 12),
            'Y_AXIS_TITLE'      => self::Y_AXIS_TITLE,
            'SERIES_1_NAME'     => self::SERIES_1_NAME,
            'SERIES_2_NAME'     => self::SERIES_2_NAME,
            'SERIES_1_DATA'     => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
            'SERIES_2_DATA'     => $this->traverse(json_encode(self::getSeriesData(1), JSON_PRETTY_PRINT), 16),
        ];

        foreach ($replacements as $search => $replacement) {
            $expected = str_replace('[' . $search . ']', $replacement, $expected);
        }

        file_put_contents('test1.txt',$expected);
        file_put_contents('test2.txt',$graphRenderer->render(new ClimateGraph()));

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
        $this->setType(ClimateGraphTest::TYPE);
        $this->setTitle(ClimateGraphTest::TITLE);
        $this->setXAxisTitle(ClimateGraphTest::X_AXIS_TITLE);
        $this->setYAxisTitle(ClimateGraphTest::Y_AXIS_TITLE);
        $this->setXAxisCategories(ClimateGraphTest::getXAxisCategories());

        $this->addSeries(new Series(ClimateGraphTest::SERIES_1_NAME, ClimateGraphTest::getSeriesData(0)));
        $this->addSeries(new Series(ClimateGraphTest::SERIES_2_NAME, ClimateGraphTest::getSeriesData(1)));
    }
}