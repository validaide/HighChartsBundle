<?php

namespace Validaide\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use Validaide\HighChartsBundle\Twig\HighChartsExtension;

/**
 * Class HighChartsBundleTest
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsBundleTest extends TestCase
{
    /** @var \AppKernel */
    private $kernel;

    protected function setUp()
    {
        require_once __DIR__ . '/AppKernel.php';

        $this->kernel = new \AppKernel('test', true);
        $this->kernel->boot();
    }

    public function test_high_charts_twig_extension_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has('validaide.highcharts.twig_extension.highcharts'));
        $this->assertInstanceOf(HighChartsExtension::class, $this->kernel->getContainer()->get('validaide.highcharts.twig_extension.highcharts'));
    }

    public function test_high_charts_renderer_graph_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has('validaide.highcharts.renderer.graph'));
        $this->assertInstanceOf(GraphRenderer::class, $this->kernel->getContainer()->get('validaide.highcharts.renderer.graph'));
    }

    public function test_high_charts_helper_graph_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has('validaide.highcharts.helper.graph'));
        $this->assertInstanceOf(GraphHelper::class, $this->kernel->getContainer()->get('validaide.highcharts.helper.graph'));
    }
}