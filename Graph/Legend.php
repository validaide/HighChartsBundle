<?php
/**
 * File: Legend.php
 * Date: 20/04/17
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@valdaide.com>
 * @link     http://www.valdaide.com
 */

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Legend
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class Legend
{
    /**
     * @var bool
     */
    private $enabled = true;

    /**
     * @return boolean
     */
    public function isEnabled(): Bool
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled(Bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->enabled)) {
            $result['enabled'] = (bool)$this->enabled;
        }

        return $result;
    }
}