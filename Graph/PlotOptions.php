<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
abstract class PlotOptions
{
    /**
     * @var bool
     */
    protected $allowPointSelect = false;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var DataLabels
     */
    private $dataLabels;

    /**
     * @return bool
     */
    public function getAllowPointSelect(): bool
    {
        return $this->allowPointSelect;
    }

    /**
     * @param bool $allowPointSelect
     */
    public function setAllowPointSelect(bool $allowPointSelect)
    {
        $this->allowPointSelect = $allowPointSelect;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return DataLabels
     */
    public function getDataLabels(): DataLabels
    {
        if (is_null($this->dataLabels)) {
            $this->dataLabels = new Label();
        }

        return $this->dataLabels;
    }

    /**
     * @param DataLabels $dataLabels
     */
    public function setDataLabels(DataLabels $dataLabels)
    {
        $this->dataLabels = $dataLabels;
    }


    abstract function toArray();
}