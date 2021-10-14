<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\PlotLine;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class PlotLineTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new PlotLine();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}