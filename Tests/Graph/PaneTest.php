<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\Pane;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class PaneTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new Pane();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}