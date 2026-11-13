<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use Tests\Validaide\HighChartsBundle\IntegrationTestCase;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;

class BatchRenderTest extends IntegrationTestCase
{
    public static function setUpBeforeClass(): void
    {
        // The graphs are declared next to their own tests
        require_once __DIR__ . '/ClimateGraphTest.php';
        require_once __DIR__ . '/ColumnStackedNormalGraphTest.php';
        require_once __DIR__ . '/HalfDonutGraphTest.php';
        require_once __DIR__ . '/SplineGraphTest.php';
    }

    /*****************************************************************************/
    /* TESTS
    /*****************************************************************************/

    public function test_render_batch_renders_every_graph_with_the_export_server(): void
    {
        // Arrange
        $directory = $this->getTestOutputDirectory() . DIRECTORY_SEPARATOR . 'batch' . DIRECTORY_SEPARATOR;
        $graphs    = [
            $directory . 'ClimateGraph.png'             => new ClimateGraph(),
            $directory . 'ColumnStackedNormalGraph.png' => new ColumnStackedNormalGraph(),
            $directory . 'HalfDonutGraph.png'           => new HalfDonutGraph(),
            $directory . 'SplineGraph.png'              => new SplineGraph(),
        ];

        // Act
        $outputPaths = (new ImageRenderer())->renderBatch($graphs, [ImageRenderer::HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE => '1.5']);

        // Assert
        $this->assertEqualsCanonicalizing(array_keys($graphs), $outputPaths);

        foreach ($outputPaths as $outputPath) {
            $this->assertStringStartsWith("\x89PNG", file_get_contents($outputPath));
        }
    }
}
