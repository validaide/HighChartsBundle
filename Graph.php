<?php

namespace Validaide\HighChartsBundle;

use Ivory\JsonBuilder\JsonBuilder;
use Validaide\HighChartsBundle\Graph\Axis;
use Validaide\HighChartsBundle\Graph\Series;

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
     * @var string
     */
    private $title = '';

    /**
     * @var string
     */
    private $xAxisTitle = null;

    /**
     * @var array|null
     */
    private $xAxisCategories = null;

    /**
     * @var array
     */
    private $yAxis = [];

    /**
     * @var array|null
     */
    private $series = [];

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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getXAxisTitle(): string
    {
        return $this->xAxisTitle;
    }

    /**
     * @param string $xAxisTitle
     */
    public function setXAxisTitle(string $xAxisTitle)
    {
        $this->xAxisTitle = $xAxisTitle;
    }

    /**
     * @return array|null
     */
    public function getXAxisCategories()
    {
        return $this->xAxisCategories;
    }

    /**
     * @param array|null $xAxisCategories
     */
    public function setXAxisCategories($xAxisCategories)
    {
        $this->xAxisCategories = $xAxisCategories;
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
     * @return string
     */
    public function toJson()
    {
        $builder = new JsonBuilder();
        $builder->setJsonEncodeOptions($builder->getJsonEncodeOptions() | JSON_PRETTY_PRINT);
        $builder->setValues([
            'chart' => [
                'type' => $this->type,
            ],
            'title' => [
                'text' => $this->title,
            ],
        ]);

        if (isset($this->xAxisTitle)) {
            $builder->setValue('[xAxis]', ['title' => ['text' => $this->xAxisTitle]]);
        }
        if (isset($this->xAxisCategories)) {
            $builder->setValue('[xAxis][categories]', $this->xAxisCategories);
        }
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
        $builder->setValue('[series]',$seriesData);

        return $builder->build();
    }
}
