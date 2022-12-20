<?php

namespace Validaide\HighChartsBundle\Graph;

abstract class PlotOptions
{
    protected DataLabels $dataLabels;

    protected bool    $allowPointSelect = false;
    protected ?string $color            = null;

    public function __construct()
    {
        $this->dataLabels = new DataLabels();
    }

    public function getAllowPointSelect(): bool
    {
        return $this->allowPointSelect;
    }

    public function setAllowPointSelect(bool $allowPointSelect)
    {
        $this->allowPointSelect = $allowPointSelect;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getDataLabels(): DataLabels
    {
        return $this->dataLabels;
    }

    public function setDataLabels(DataLabels $dataLabels)
    {
        $this->dataLabels = $dataLabels;
    }

    abstract function toArray();
}