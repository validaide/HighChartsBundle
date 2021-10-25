<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\Legend;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class LegendTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new Legend();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}