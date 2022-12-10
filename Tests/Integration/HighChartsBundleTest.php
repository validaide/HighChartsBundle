<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use Validaide\HighChartsBundle\Twig\HighChartsExtension;

class HighChartsBundleTest extends TestCase
{
    private ?AppKernel $kernel;

    protected function setUp(): void
    {
        require_once __DIR__ . '/AppKernel.php';

        $this->kernel = new AppKernel('test', true);
        $this->kernel->boot();
    }

    protected function tearDown(): void
    {
        $this->kernel = null;

        parent::tearDown();
    }

    /*****************************************************************************/
    /* TESTS
    /*****************************************************************************/

    public function test_high_charts_twig_extension_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has(HighChartsExtension::class));
    }

    public function test_high_charts_renderer_graph_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has(GraphRenderer::class));
    }

    public function test_high_charts_helper_graph_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has(GraphHelper::class));
    }
}