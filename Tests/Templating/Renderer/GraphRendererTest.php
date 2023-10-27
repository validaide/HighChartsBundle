<?php

namespace Tests\Validaide\HighChartsBundle\Templating\Renderer;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

class GraphRendererTest extends TestCase
{
    private ?GraphRenderer $graphRenderer = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->graphRenderer = new GraphRenderer();
    }

    protected function tearDown(): void
    {
        $this->graphRenderer = null;

        parent::tearDown();
    }

    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    /**
     *
     */
    public function test_graph_renderer()
    {
        $this->assertInstanceOf(GraphRenderer::class, $this->graphRenderer);
    }

    /**
     *
     */
    public function test_render_html()
    {
        $graph = new Graph();
        $graph->setHeight('400px');
        $graph->setWidth('100%');

        $this->assertSame(
            '<div id="graph" style="width:100%;height:400px;"></div>',
            $this->graphRenderer->renderHtml($graph)
        );
    }

    /**
     *
     */
    public function test_render_html_without_style_tag()
    {
        $graph = new Graph();

        $this->assertSame(
            '<div id="graph"></div>',
            $this->graphRenderer->renderHtml($graph)
        );
    }

    /**
     *
     */
    public function test_render_javascript()
    {
        $graph = new Graph();
        $graph->setHeight('400px');
        $graph->setWidth('100%');

        $expected  = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'GraphRendererTest.txt');
        $generated = $this->graphRenderer->renderJavascript($graph);
        file_put_contents('graph_renderer_test_generated.txt', $generated);
        $this->assertSame(
            $expected,
            $generated
        );
    }
}