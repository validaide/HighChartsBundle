<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\Marker;

class MarkerTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new Marker();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}