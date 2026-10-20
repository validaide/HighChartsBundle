<?php

namespace Tests\Validaide\HighChartsBundle\Templating\Renderer;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;

class ImageRendererTest extends TestCase
{
    private string  $binDirectory;
    private ?string $path;

    protected function setUp(): void
    {
        parent::setUp();

        $this->binDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('image_renderer_test_');
        $this->path         = $_ENV['PATH'] ?? null;

        (new Filesystem())->mkdir($this->binDirectory);

        // Processes get $_ENV, so the fake export server below is found first
        $_ENV['PATH'] = $this->binDirectory . PATH_SEPARATOR . getenv('PATH');
    }

    protected function tearDown(): void
    {
        if (is_null($this->path)) {
            unset($_ENV['PATH']);
        } else {
            $_ENV['PATH'] = $this->path;
        }

        (new Filesystem())->remove($this->binDirectory);

        parent::tearDown();
    }

    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    public function test_render_stops_the_export_server_when_it_times_out(): void
    {
        // Arrange
        $this->createExportServerThatHangs(false);

        // Act
        $this->renderUntilTimeout();

        // Assert
        $this->assertFalse($this->isRunning($this->getExportServerPid()));
    }

    public function test_render_kills_the_export_server_when_it_ignores_the_stop_signal(): void
    {
        // Arrange
        $this->createExportServerThatHangs(true);

        // Act
        $this->renderUntilTimeout();

        // Assert
        $this->assertFalse($this->isRunning($this->getExportServerPid()));
    }

    public function test_render_stops_the_export_server_when_php_dies_during_the_render(): void
    {
        // Arrange
        $this->createExportServerThatHangs(false);
        $php = $this->startRenderInAnotherPhpProcess();

        // Act
        $php->signal(9);
        sleep(3);

        // Assert
        $this->assertFalse($this->isRunning($this->getExportServerPid()));
    }

    /*****************************************************************************/
    /* Helpers
    /*****************************************************************************/

    private function createExportServerThatHangs(bool $ignoresStopSignal): void
    {
        $script = $this->binDirectory . DIRECTORY_SEPARATOR . ImageRenderer::CMD_HIGHCHARTS_EXPORT_SERVER;

        file_put_contents($script, implode(PHP_EOL, [
            '#!/bin/sh',
            '[ "$#" -eq 0 ] && exit 0',
            $ignoresStopSignal ? "trap '' TERM" : '',
            'echo $$ > "$(dirname "$0")/pid"',
            'exec sleep 120',
        ]));
        chmod($script, 0755);
    }

    private function renderUntilTimeout(): void
    {
        try {
            (new ImageRenderer(1))->render(new Graph(), [], $this->binDirectory . DIRECTORY_SEPARATOR . 'graph.png');
            $this->fail('The render did not time out.');
        } catch (RuntimeException) {
            // The export server was stopped by the timeout
        }
    }

    /**
     * Returns once the export server of that render is running.
     */
    private function startRenderInAnotherPhpProcess(): Process
    {
        $code = sprintf(
            'require %s; (new %s(1))->render(new %s(), [], %s);',
            var_export(dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php', true),
            ImageRenderer::class,
            Graph::class,
            var_export($this->binDirectory . DIRECTORY_SEPARATOR . 'graph.png', true),
        );

        $php = new Process([PHP_BINARY, '-r', $code]);
        $php->start();

        $deadline = microtime(true) + 10;
        while (!file_exists($this->binDirectory . DIRECTORY_SEPARATOR . 'pid') && microtime(true) < $deadline) {
            usleep(50000);
        }

        return $php;
    }

    private function getExportServerPid(): int
    {
        return (int)file_get_contents($this->binDirectory . DIRECTORY_SEPARATOR . 'pid');
    }

    private function isRunning(int $pid): bool
    {
        $stat = @file_get_contents(sprintf('/proc/%d/stat', $pid));

        // A killed process stays a zombie until its new parent collects it, but it is no longer running
        return $stat !== false && substr($stat, strrpos($stat, ')') + 2, 1) !== 'Z';
    }
}
