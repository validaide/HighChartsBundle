<?php

namespace Tests\Validaide\HighChartsBundle\Graph;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph\Title;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class TitleTest extends TestCase
{
    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    //------------------------------------------------------------------------------
    // toArray
    //------------------------------------------------------------------------------

    public function test_to_array_with_defaults()
    {
        $pane     = new Title();
        $paneData = $pane->toArray();
        $this->assertIsArray($paneData);
    }
}