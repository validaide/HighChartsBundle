<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\PlotBand;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class PlotBandTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new PlotBand();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}