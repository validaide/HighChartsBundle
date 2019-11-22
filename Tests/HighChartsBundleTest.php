<?php

namespace Validaide\HighChartsBundle\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Validaide\HighChartsBundle\HighChartsBundle;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsBundleTest extends TestCase
{
    /** @var HighChartsBundle */
    private $bundle;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->bundle = new HighChartsBundle();
    }

    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    /**
     *
     */
    public function testBundle()
    {
        $this->assertInstanceOf(Bundle::class, $this->bundle);
    }
}