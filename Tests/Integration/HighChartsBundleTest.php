<?php

namespace Validaide\Tests\Integration;

use PHPUnit\Framework\TestCase;

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

    /*****************************************************************************/
    /* TESTS
    /*****************************************************************************/

    public function test_high_charts_twig_extension_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has('Validaide\HighChartsBundle\Twig\HighChartsExtension'));
    }

    public function test_high_charts_renderer_graph_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has('Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer'));
    }

    public function test_high_charts_helper_graph_is_available()
    {
        $this->assertTrue($this->kernel->getContainer()->has('Validaide\HighChartsBundle\Templating\Helper\GraphHelper'));
    }
}