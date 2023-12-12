<?php

namespace Validaide\HighChartsBundle;

use ReflectionClass;
use Validaide\Common\JsonBuilder\JsonBuilder;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\Credits;
use Validaide\HighChartsBundle\Graph\Drilldown;
use Validaide\HighChartsBundle\Graph\Exporting;
use Validaide\HighChartsBundle\Graph\Legend;
use Validaide\HighChartsBundle\Graph\Pane;
use Validaide\HighChartsBundle\Graph\PlotOptions;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Graph\SubTitle;
use Validaide\HighChartsBundle\Graph\Title;
use Validaide\HighChartsBundle\Graph\Tooltip;

class Graph
{
    protected ?string      $jsChartId   = null;
    protected ?string      $htmlId      = null;
    protected ?string      $cssClass    = null;
    protected ?string      $width       = null;
    protected ?string      $height      = null;
    protected string       $type        = 'line';
    protected ?Drilldown   $drilldown   = null;
    protected ?bool        $plotShadow  = null;
    protected Title        $title;
    protected ?SubTitle    $subTitle    = null;
    protected Axis         $xAxis;
    protected Credits      $credits;
    protected Tooltip      $tooltip;
    protected Legend       $legend;
    protected ?array       $margin      = null;
    protected ?Pane        $pane        = null;
    protected ?PlotOptions $plotOptions = null;
    protected ?bool        $polar       = null;
    protected ?Exporting   $exporting   = null;
    protected ?string      $zoomType    = null;

    /** @var Axis[] */
    protected array $yAxis = [];
    /** @var Series[] */
    protected array $series = [];

    public function __construct()
    {
        $this->xAxis   = new Axis();
        $this->title   = new Title();
        $this->credits = new Credits();
        $this->tooltip = new Tooltip();
        $this->legend  = new Legend();
    }

    public function getHtmlId(): string
    {
        if (is_null($this->htmlId)) {
            return self::toSnakeCase(self::getClassShortName($this));
        }

        return $this->htmlId;
    }

    public function setHtmlId(string $htmlId): void
    {
        $this->htmlId = $htmlId;
    }

    public function getJsChartId(): string
    {
        if (is_null($this->jsChartId)) {
            return self::toSnakeCase(self::getClassShortName($this));
        }

        return $this->jsChartId;
    }

    public function setJsChartId(string $jsChartId): void
    {
        $this->jsChartId = $jsChartId;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getSubTitle(): ?SubTitle
    {
        return $this->subTitle;
    }

    public function setSubTitle(SubTitle $subTitle): void
    {
        $this->subTitle = $subTitle;
    }

    public function getXAxis(): Axis
    {
        return $this->xAxis;
    }

    public function addYAxis(Axis $axis): void
    {
        $this->yAxis[] = $axis;
    }

    public function getCssClass(): ?string
    {
        return $this->cssClass;
    }

    public function setCssClass(?string $cssClass): void
    {
        $this->cssClass = $cssClass;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(?string $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(?string $height): void
    {
        $this->height = $height;
    }

    public function isPolar(): bool
    {
        return $this->polar;
    }

    public function setPolar(bool $polar): void
    {
        $this->polar = $polar;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function addSeries(Series $series): void
    {
        $this->series[] = $series;
    }

    public function getCredits(): Credits
    {
        return $this->credits;
    }

    public function setCredits(Credits $credits): void
    {
        $this->credits = $credits;
    }

    public function getLegend(): Legend
    {
        return $this->legend;
    }

    public function setLegend(Legend $legend): void
    {
        $this->legend = $legend;
    }

    public function getMargin(): ?array
    {
        return $this->margin;
    }

    public function setMargin(array|null $margin): void
    {
        $this->margin = $margin;
    }

    public function getPane(): Pane
    {
        return $this->pane;
    }

    public function setPane(Pane $pane): void
    {
        $this->pane = $pane;
    }

    public function getTooltip(): Tooltip
    {
        return $this->tooltip;
    }

    public function setTooltip(Tooltip $tooltip): void
    {
        $this->tooltip = $tooltip;
    }

    public function isPlotShadow(): bool
    {
        return $this->plotShadow;
    }

    public function setPlotShadow(bool $plotShadow): void
    {
        $this->plotShadow = $plotShadow;
    }

    public function getPlotOptions(): PlotOptions
    {
        return $this->plotOptions;
    }

    public function setPlotOptions(PlotOptions $plotOptions): void
    {
        $this->plotOptions = $plotOptions;
    }

    public function getZoomType(): string
    {
        return $this->zoomType;
    }

    public function setZoomType(string $zoomType): void
    {
        $this->zoomType = $zoomType;
    }

    public function setDrillDown(Drilldown $drilldown): void
    {
        $this->drilldown = $drilldown;
    }

    public function getDrillDown(): ?Drilldown
    {
        return $this->drilldown;
    }

    public function getExporting(): ?Exporting
    {
        return $this->exporting;
    }

    public function setExporting(Exporting $exporting): void
    {
        $this->exporting = $exporting;
    }

    public static function toSnakeCase(string $camelCase): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $camelCase));
    }

    public static function getClassShortName(object $object): string
    {
        $reflection = new ReflectionClass($object);

        return $reflection->getShortName();
    }

    public function toJson(): string
    {
        $builder = new JsonBuilder();
        $builder->setJsonEncodeOptions($builder->getJsonEncodeOptions() | JSON_PRETTY_PRINT);
        $builder->setValues([
            'chart'   => [
                'type'   => $this->type,
                'height' => $this->height,
            ],
            'credits' => $this->credits->toArray(),
            'title'   => $this->title->toArray(),
            'tooltip' => $this->tooltip->toArray(),
            'legend'  => $this->legend->toArray(),
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
                $yAxis[] = $axis->toArray();
            }
            $builder->setValue('[yAxis]', $yAxis);
        }

        $seriesData = [];
        foreach ($this->series as $series) {
            $seriesData[] = $series->toArray();
        }
        $builder->setValue('[series]', $seriesData);

        return $builder->build();
    }
}