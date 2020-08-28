<?php

namespace Validaide\HighChartsBundle;

use Ivory\JsonBuilder\JsonBuilder;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\Credits;
use Validaide\HighChartsBundle\Graph\Drilldown;
use Validaide\HighChartsBundle\Graph\Exporting;
use Validaide\HighChartsBundle\Graph\Pane;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Graph\SubTitle;
use Validaide\HighChartsBundle\Graph\Title;
use Validaide\HighChartsBundle\Graph\Legend;
use Validaide\HighChartsBundle\Graph\Tooltip;
use Validaide\HighChartsBundle\Graph\PlotOptions;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Graph
{
    /**
     * @var string
     */
    private $htmlId = 'graph_container';

    /**
     * @var string
     */
    private $width = '100%';

    /**
     * @var string
     */
    private $height = '400px';

    /**
     * @var string
     */
    private $jsChartId = 'graph';

    /**
     * @var string
     */
    private $type = 'line';

    /**
     * @var Drilldown|null
     */
    private $drilldown;

    /**
     * @var bool
     */
    private $plotShadow;

    /**
     * @var Title
     */
    private $title;

    /**
     * @var SubTitle|null
     */
    private $subTitle;

    /**
     * @var Axis
     */
    private $xAxis;

    /**
     * @var array
     */
    private $yAxis = [];

    /**
     * @var array|null
     */
    private $series = [];

    /**
     * @var Credits
     */
    private $credits;

    /**
     * @var Tooltip
     */
    public $tooltip;

    /**
     * @var Legend
     */
    public $legend;

    /**
     * @var array|null
     */
    public $margin;

    /**
     * @var Pane
     */
    public $pane;

    /**
     * @var PlotOptions
     */
    public $plotOptions;

    /**
     * @var bool
     */
    public $polar;

    /**
     * @var Exporting
     */
    public $exporting;

    /**
     * @var string
     */
    private $zoomType;

    /**
     */
    public function __construct()
    {
        $this->xAxis    = new Axis();
        $this->title    = new Title();
        $this->credits  = new Credits();
        $this->tooltip  = new Tooltip();
        $this->legend   = new Legend();
    }

    /**
     * @return string
     */
    public function getHtmlId(): string
    {
        return $this->htmlId;
    }

    /**
     * @param string $htmlId
     */
    public function setHtmlId(string $htmlId): void
    {
        $this->htmlId = $htmlId;
    }

    /**
     * @return string
     */
    public function getJsChartId(): string
    {
        return $this->jsChartId;
    }

    /**
     * @param string $jsChartId
     */
    public function setJsChartId(string $jsChartId): void
    {
        $this->jsChartId = $jsChartId;
    }

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @return SubTitle|null
     */
    public function getSubTitle(): ?SubTitle
    {
        return $this->subTitle;
    }

    /**
     * @param SubTitle $subTitle
     */
    public function setSubTitle(SubTitle $subTitle): void
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return Axis
     */
    public function getXAxis(): Axis
    {
        return $this->xAxis;
    }

    /**
     * @param Axis $axis
     */
    public function addYAxis(Axis $axis): void
    {
        $this->yAxis[] = $axis;
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    /**
     * @return bool
     */
    public function isPolar(): bool
    {
        return $this->polar;
    }

    /**
     * @param bool $polar
     */
    public function setPolar(bool $polar): void
    {
        $this->polar = $polar;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param Series $series
     */
    public function addSeries(Series $series): void
    {
        $this->series[] = $series;
    }

    /**
     * @return Credits
     */
    public function getCredits(): Credits
    {
        return $this->credits;
    }

    /**
     * @param Credits $credits
     */
    public function setCredits(Credits $credits): void
    {
        $this->credits = $credits;
    }

    /**
     * @return Legend
     */
    public function getLegend(): Legend
    {
        return $this->legend;
    }

    /**
     * @param Legend $legend
     */
    public function setLegend(Legend $legend): void
    {
        $this->legend = $legend;
    }

    /**
     * @return array|null
     */
    public function getMargin(): ?array
    {
        return $this->margin;
    }

    /**
     * @param array|null $margin
     */
    public function setMargin($margin): void
    {
        $this->margin = $margin;
    }

    /**
     * @return Pane
     */
    public function getPane(): Pane
    {
        return $this->pane;
    }

    /**
     * @param Pane $pane
     */
    public function setPane(Pane $pane): void
    {
        $this->pane = $pane;
    }

    /**
     * @return Tooltip
     */
    public function getTooltip(): Tooltip
    {
        return $this->tooltip;
    }

    /**
     * @param Tooltip $tooltip
     */
    public function setTooltip(Tooltip $tooltip): void
    {
        $this->tooltip = $tooltip;
    }

    /**
     * @return bool
     */
    public function isPlotShadow(): bool
    {
        return $this->plotShadow;
    }

    /**
     * @param bool $plotShadow
     */
    public function setPlotShadow(bool $plotShadow): void
    {
        $this->plotShadow = $plotShadow;
    }

    /**
     * @return PlotOptions
     */
    public function getPlotOptions(): PlotOptions
    {
        return $this->plotOptions;
    }

    /**
     * @param PlotOptions $plotOptions
     */
    public function setPlotOptions(PlotOptions $plotOptions): void
    {
        $this->plotOptions = $plotOptions;
    }

    /**
     * @return string
     */
    public function getZoomType(): string
    {
        return $this->zoomType;
    }

    /**
     * @param string $zoomType
     */
    public function setZoomType(string $zoomType): void
    {
        $this->zoomType = $zoomType;
    }

    /**
     * @param Drilldown $drilldown
     */
    public function setDrillDown(Drilldown $drilldown): void
    {
        $this->drilldown = $drilldown;
    }

    /**
     * @return Drilldown|null
     */
    public function getDrillDown(): ?Drilldown
    {
        return $this->drilldown;
    }

    /**
     * @return Exporting|null
     */
    public function getExporting(): ?Exporting
    {
        return $this->exporting;
    }

    /**
     * @param Exporting $exporting
     */
    public function setExporting(Exporting $exporting): void
    {
        $this->exporting = $exporting;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        $builder = new JsonBuilder();
        $builder->setJsonEncodeOptions($builder->getJsonEncodeOptions() | JSON_PRETTY_PRINT);
        $builder->setValues([
            'chart'    => [
                'type' => $this->type,
            ],
            'credits'  => $this->credits->toArray(),
            'title'    => $this->title->toArray(),
            'tooltip'  => $this->tooltip->toArray(),
            'legend'   => $this->legend->toArray(),
        ]);

        if (isset($this->subTitle) && !empty($this->subTitle)) {
            $builder->setValue('[subtitle]', $this->subTitle->toArray());
        }

        if (isset($this->drilldown) && !empty($this->drilldown)) {
            $builder->setValue('[drilldown]', $this->drilldown->toArray());
        }

        if (isset($this->plotShadow)) {
            $builder->setValue('[chart][plotShadow]', $this->plotShadow);
        }

        if (isset($this->margin)) {
            $builder->setValue('[chart][margin]', $this->margin);
        }

        if (isset($this->polar)) {
            $builder->setValue('[chart][polar]', $this->polar);
        }

        if (is_object($this->plotOptions)) {
            $builder->setValue('[plotOptions]', $this->plotOptions->toArray());
        }

        if (is_object($this->pane)) {
            $builder->setValue('[pane]', $this->pane->toArray());
        }

        if (is_object($this->exporting)) {
            $builder->setValue('[exporting]', $this->exporting->toArray());
        }

        if (isset($this->zoomType)) {
            $builder->setValue('[charts]', $this->zoomType);
        }

        if (isset($this->xAxis)) {
            $builder->setValue('[xAxis]', $this->xAxis->toArray());
        }

        if (isset($this->yAxis)) {
            $yAxis = [];
            foreach ($this->yAxis as $axis) {
                /** @var Axis $axis */
                $yAxis[] = $axis->toArray();
            }
            $builder->setValue('[yAxis]', $yAxis);
        }

        $seriesData = [];
        /** @var Series $series */
        foreach ($this->series as $series) {
            $seriesData[] = $series->toArray();
        }
        $builder->setValue('[series]', $seriesData);

        return $builder->build();
    }
}
