<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\SubTitle;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class SubTitleTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new SubTitle();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}