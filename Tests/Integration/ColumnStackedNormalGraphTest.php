<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use Validaide\HighChartsBundle\Graph\SubTitle;
use Tests\Validaide\HighChartsBundle\IntegrationTestCase;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\PlotOptions\Column;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\ValueObject\Color;

class ColumnStackedNormalGraphTest extends IntegrationTestCase
{
    final public const TYPE               = 'column';
    final public const TITLE              = 'Test';
    final public const SUB_TITLE          = 'Sub Test';
    final public const Y_AXIS_TITLE_FRUIT = 'Fruit';
    final public const X_AXIS_TITLE       = 'Months';
    final public const SERIES_1_NAME      = 'Plot 1';
    final public const SERIES_1_Y_AXIS    = 0;
    final public const SERIES_2_NAME      = 'Plot 2';
    final public const SERIES_2_Y_AXIS    = 0;
    final public const SERIES_3_NAME      = 'Plot 3';
    final public const SERIES_3_Y_AXIS    = 0;

    public static function getXAxisCategories(): array
    {
        return ['apples', 'pears', 'oranges'];
    }

    public static function getSeriesData(int $seriesIndex = 1): array
    {
        $series = [];
        $series[0] = [1, 2, 3];
        $series[1] = [2, 2, 3];
        $series[2] = [1, 2, 2];

        return $series[$seriesIndex];
    }

    /**
     *
     */
    public function test_render_with_title_but_no_subtitle()
    {
        $replacements = [
            'TYPE'               => self::TYPE,
            'TITLE'              => self::TITLE,
            'X_AXIS_TITLE'       => self::X_AXIS_TITLE,
            'X_AXIS_CATEGORIES'  => $this->traverse(json_encode(self::getXAxisCategories(), JSON_PRETTY_PRINT), 12),
            'Y_AXIS_TITLE_FRUIT' => self::Y_AXIS_TITLE_FRUIT,
            'SERIES_1_NAME'      => self::SERIES_1_NAME,
            'SERIES_1_Y_AXIS'    => self::SERIES_1_Y_AXIS,
            'SERIES_2_NAME'      => self::SERIES_2_NAME,
            'SERIES_2_Y_AXIS'    => self::SERIES_2_Y_AXIS,
            'SERIES_3_NAME'      => self::SERIES_3_NAME,
            'SERIES_3_Y_AXIS'    => self::SERIES_3_Y_AXIS,
            'SERIES_1_DATA'      => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
            'SERIES_2_DATA'      => $this->traverse(json_encode(self::getSeriesData(1), JSON_PRETTY_PRINT), 16),
            'SERIES_3_DATA'      => $this->traverse(json_encode(self::getSeriesData(2), JSON_PRETTY_PRINT), 16),
        ];

        $this->assertGraph(new ColumnStackedNormalGraph(), $replacements);
    }

    /**
     *
     */
    public function test_render_with_title_and_subtitle()
    {
        $replacements = [
            'TYPE'               => self::TYPE,
            'TITLE'              => self::TITLE,
            'SUBTITLE'           => self::SUB_TITLE,
            'X_AXIS_TITLE'       => self::X_AXIS_TITLE,
            'X_AXIS_CATEGORIES'  => $this->traverse(json_encode(self::getXAxisCategories(), JSON_PRETTY_PRINT), 12),
            'Y_AXIS_TITLE_FRUIT' => self::Y_AXIS_TITLE_FRUIT,
            'SERIES_1_NAME'      => self::SERIES_1_NAME,
            'SERIES_1_Y_AXIS'    => self::SERIES_1_Y_AXIS,
            'SERIES_2_NAME'      => self::SERIES_2_NAME,
            'SERIES_2_Y_AXIS'    => self::SERIES_2_Y_AXIS,
            'SERIES_3_NAME'      => self::SERIES_3_NAME,
            'SERIES_3_Y_AXIS'    => self::SERIES_3_Y_AXIS,
            'SERIES_1_DATA'      => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
            'SERIES_2_DATA'      => $this->traverse(json_encode(self::getSeriesData(1), JSON_PRETTY_PRINT), 16),
            'SERIES_3_DATA'      => $this->traverse(json_encode(self::getSeriesData(2), JSON_PRETTY_PRINT), 16),
        ];

        $this->assertGraph(new ColumnStackedNormalWithSubTitleGraph(), $replacements);
    }

    /**
     *
     */
    public function test_render_with_hidden_title()
    {
        $replacements = [
            'TYPE'               => self::TYPE,
            'TITLE'              => self::TITLE,
            'X_AXIS_TITLE'       => self::X_AXIS_TITLE,
            'X_AXIS_CATEGORIES'  => $this->traverse(json_encode(self::getXAxisCategories(), JSON_PRETTY_PRINT), 12),
            'Y_AXIS_TITLE_FRUIT' => self::Y_AXIS_TITLE_FRUIT,
            'SERIES_1_NAME'      => self::SERIES_1_NAME,
            'SERIES_1_Y_AXIS'    => self::SERIES_1_Y_AXIS,
            'SERIES_2_NAME'      => self::SERIES_2_NAME,
            'SERIES_2_Y_AXIS'    => self::SERIES_2_Y_AXIS,
            'SERIES_3_NAME'      => self::SERIES_3_NAME,
            'SERIES_3_Y_AXIS'    => self::SERIES_3_Y_AXIS,
            'SERIES_1_DATA'      => $this->traverse(json_encode(self::getSeriesData(0), JSON_PRETTY_PRINT), 16),
            'SERIES_2_DATA'      => $this->traverse(json_encode(self::getSeriesData(1), JSON_PRETTY_PRINT), 16),
            'SERIES_3_DATA'      => $this->traverse(json_encode(self::getSeriesData(2), JSON_PRETTY_PRINT), 16),
        ];

        $this->assertGraph(new ColumnStackedNormalWithHiddenTitleGraph(), $replacements);
    }
}

class ColumnStackedNormalGraph extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $columnPlotOptions = new Column();
        $columnPlotOptions->setStacking(Column::STACKING_NORMAL);
        $this->setPlotOptions($columnPlotOptions);

        $this->setType(ColumnStackedNormalGraphTest::TYPE);
        $this->setPlotShadow(false);
        $this->getTitle()->setText(ColumnStackedNormalGraphTest::TITLE);
        $this->getLegend()->setEnabled(true);

        $this->setHeight('400px');
        $this->setWidth('100%');

        // xAxis
        $this->getXAxis()->getTitle()->setText(ColumnStackedNormalGraphTest::X_AXIS_TITLE);
        $this->getXAxis()->setCategories(ColumnStackedNormalGraphTest::getXAxisCategories());
        $this->getXAxis()->setCrosshair(true);

        // yAxis
        $yAxisFruit = new Axis();
        $yAxisFruit->getTitle()->setText(ColumnStackedNormalGraphTest::Y_AXIS_TITLE_FRUIT);
        $yAxisFruit->setAlignTicks(true);
        $yAxisFruit->setEndOnTick(true);
        $yAxisFruit->setOpposite(true);
        $yAxisFruit->labels->setFormat('{value}');

        $this->addYAxis($yAxisFruit);

        $seriesPlotOne = new Series(ColumnStackedNormalGraphTest::SERIES_1_NAME, ColumnStackedNormalGraphTest::getSeriesData(0));
        $seriesPlotOne->setType('column');
        $seriesPlotOne->setYAxis(ColumnStackedNormalGraphTest::SERIES_1_Y_AXIS);
        $seriesPlotOne->setColor(new Color('#0000FF'));
        $seriesPears = new Series(ColumnStackedNormalGraphTest::SERIES_2_NAME, ColumnStackedNormalGraphTest::getSeriesData(1));
        $seriesPears->setType('column');
        $seriesPears->setYAxis(ColumnStackedNormalGraphTest::SERIES_2_Y_AXIS);
        $seriesPears->setColor(new Color('#FF0000'));
        $seriesOranges = new Series(ColumnStackedNormalGraphTest::SERIES_3_NAME, ColumnStackedNormalGraphTest::getSeriesData(2));
        $seriesOranges->setType('column');
        $seriesOranges->setYAxis(ColumnStackedNormalGraphTest::SERIES_3_Y_AXIS);
        $seriesOranges->setColor(new Color('lightblue'));

        $this->addSeries($seriesPlotOne);
        $this->addSeries($seriesPears);
        $this->addSeries($seriesOranges);
    }
}

class ColumnStackedNormalWithSubTitleGraph extends ColumnStackedNormalGraph
{
    public function __construct()
    {
        parent::__construct();

        $subTitle = new SubTitle();
        $subTitle->setText(ColumnStackedNormalGraphTest::SUB_TITLE);
        $this->setSubTitle($subTitle);
    }
}

class ColumnStackedNormalWithHiddenTitleGraph extends ColumnStackedNormalGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->getTitle()->setHidden(true);
    }
}
