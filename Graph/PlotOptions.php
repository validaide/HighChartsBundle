<?php
/**
 * File: PlotOptions.php
 * Date: 20/04/17
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@valdaide.com>
 * @link     http://www.valdaide.com
 */

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: PlotOptions
 *
 * @package  VendorName
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

    abstract function toArray();
}