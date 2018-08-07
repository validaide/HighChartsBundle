<?php

namespace Tests\Validaide\HighChartsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Validaide\HighChartsBundle\HighChartsBundle;
use PHPUnit\Framework\TestCase;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsBundleTest extends TestCase
{
    /**
     * @var HighChartsBundle
     */
    private $bundle;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->bundle = new HighChartsBundle();
    }

    public function testBundle()
    {
        $this->assertInstanceOf(Bundle::class, $this->bundle);
    }
}