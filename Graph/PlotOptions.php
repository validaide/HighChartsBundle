<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
abstract class PlotOptions
{
    protected bool $allowPointSelect = false;

    protected ?string $color = null;

    /**
     * @var DataLabels
     */
    private $dataLabels;

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
        if (is_null($this->dataLabels)) {
            $this->dataLabels = new Label();
        }

        return $this->dataLabels;
    }

    public function setDataLabels(DataLabels $dataLabels)
    {
        $this->dataLabels = $dataLabels;
    }


    abstract function toArray();
}