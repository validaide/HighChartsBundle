<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\Series;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class SeriesTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new Series('my_series', [1, 2, 3]);
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}