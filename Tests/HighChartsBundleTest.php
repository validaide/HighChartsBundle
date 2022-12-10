<?php

namespace Tests\Validaide\HighChartsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Validaide\HighChartsBundle\HighChartsBundle;
use PHPUnit\Framework\TestCase;

class HighChartsBundleTest extends TestCase
{
    private HighChartsBundle $bundle;

    protected function setUp(): void
    {
        $this->bundle = new HighChartsBundle();
    }

    public function testBundle()
    {
        $this->assertInstanceOf(Bundle::class, $this->bundle);
    }
}