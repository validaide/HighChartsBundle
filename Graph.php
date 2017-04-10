<?php

namespace Validaide\HighChartsBundle;

use Ivory\JsonBuilder\JsonBuilder;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\Credits;
use Validaide\HighChartsBundle\Graph\Series;
use Validaide\HighChartsBundle\Graph\Title;
use Validaide\HighChartsBundle\Graph\Tooltip;

/**
 * Class: Graph
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
     * @var Title
     */
    private $title;

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
     * @var bool
     */
    public $legend = true;

    /**
     * Graph constructor.
     */
    public function __construct()
    {
        $this->xAxis   = new Axis();
        $this->title   = new Title();
        $this->credits = new Credits();
        $this->tooltip = new Tooltip();
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
    public function setHtmlId(string $htmlId)
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
    public function setJsChartId(string $jsChartId)
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
     * @return Axis
     */
    public function getXAxis(): Axis
    {
        return $this->xAxis;
    }

    /**
     * @param Axis $axis
     */
    public function addYAxis(Axis $axis)
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
    public function setWidth(string $width)
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
    public function setHeight(string $height)
    {
        $this->height = $height;
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
    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function addSeries(Series $series)
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
    public function setCredits(Credits $credits)
    {
        $this->credits = $credits;
    }

    /**
     * @return boolean
     */
    public function isLegend()
    {
        return $this->legend;
    }

    /**
     * @param boolean $legend
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        $builder = new JsonBuilder();
        $builder->setJsonEncodeOptions($builder->getJsonEncodeOptions() | JSON_PRETTY_PRINT);
        $builder->setValues([
            'chart'   => [
                'type' => $this->type,
            ],
            'credits' => $this->credits->toArray(),
            'title'   => $this->title->toArray(),
            'tooltip' => $this->tooltip->toArray(),
            'xAxis'   => $this->xAxis->toArray(),
            'legend'  => ['enabled' => $this->isLegend()]
        ]);

        if (isset($this->yAxis)) {
            $yAxis = [];
            foreach ($this->yAxis as $axis) {
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
