<?php

namespace Validaide\HighChartsBundle\Tests\Templating\Renderer;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class GraphRendererTest extends TestCase
{
    /**
     * @var GraphRenderer
     */
    private $graphRenderer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->graphRenderer = new GraphRenderer();
    }

    public function test_graph_renderer()
    {
        $this->assertInstanceOf(GraphRenderer::class, $this->graphRenderer);
    }

    public function test_render_html()
    {
        $graph = new Graph();

        $this->assertSame(
            '<div id="graph_container" style="width:100%;height:400px;"></div>',
            $this->graphRenderer->renderHtml($graph)
        );
    }

    public function test_render_javascript()
    {
        $graph = new Graph();

        $expected = <<<'EOF'
<script type="text/javascript">
$(function () {
var graph = Highcharts.chart("graph_container", 
{
    "chart": {
        "type": "line"
    },
    "title": {
        "text": ""
    },
    "series": []
}
);
});
</script>
EOF;

        $this->assertSame(
            $expected,
            $this->graphRenderer->renderJavascript($graph)
        );
    }
}