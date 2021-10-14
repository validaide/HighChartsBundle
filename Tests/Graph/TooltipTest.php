<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\Tooltip;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class TooltipTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new Tooltip();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}