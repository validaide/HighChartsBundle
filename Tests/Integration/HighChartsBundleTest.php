<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use Validaide\HighChartsBundle\Twig\HighChartsExtension;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsBundleTest extends TestCase
{
    /** @var AppKernel */
    private $kernel;

    protected function setUp(): void
    {
        require_once __DIR__ . '/AppKernel.php';

        $this->kernel = new AppKernel('test', true);
        $this->kernel->boot();
    }

    /*****************************************************************************/
    /* TESTS
    /*****************************************************************************/

    public function test_high_charts_twig_extension_is_available()
    {
        $this->markTestSkipped('Need to find a fix');
        $this->assertTrue($this->kernel->getContainer()->has(HighChartsExtension::class));
    }

    public function test_high_charts_renderer_graph_is_available()
    {
        $this->markTestSkipped('Need to find a fix');
        $this->assertTrue($this->kernel->getContainer()->has(GraphRenderer::class));
    }

    public function test_high_charts_helper_graph_is_available()
    {
        $this->markTestSkipped('Need to find a fix');
        $this->assertTrue($this->kernel->getContainer()->has(GraphHelper::class));
    }
}