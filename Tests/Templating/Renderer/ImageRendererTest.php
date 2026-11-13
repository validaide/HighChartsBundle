<?php

namespace Tests\Validaide\HighChartsBundle\Templating\Renderer;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\ExportServerFailedException;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;
use Validaide\HighChartsBundle\Templating\Renderer\RenderingException;

class ImageRendererTest extends TestCase
{
    private const string TITLE_WITHOUT_IMAGE    = 'A chart that gets no image';
    private const string TITLE_WITH_EMPTY_IMAGE = 'A chart that gets an empty image';

    private string       $binDirectory;
    private ?string      $path;
    private string|false $loadConfigPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->binDirectory   = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('image_renderer_test_');
        $this->path           = $_ENV['PATH'] ?? null;
        $this->loadConfigPath = getenv(ImageRenderer::ENV_HIGHCHARTS_LOADCONFIG);

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

        putenv($this->loadConfigPath === false ? ImageRenderer::ENV_HIGHCHARTS_LOADCONFIG : ImageRenderer::ENV_HIGHCHARTS_LOADCONFIG . '=' . $this->loadConfigPath);

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

    public function test_render_lets_the_export_server_close_its_browser_when_php_dies_during_the_render(): void
    {
        // Arrange
        $this->createExportServerWithBrowser();
        $php = $this->startRenderInAnotherPhpProcess();

        // Act
        $php->signal(9);
        sleep(3);

        // Assert
        $this->assertFalse($this->isRunning($this->getBrowserPid()));
    }

    public function test_render_starts_one_export_server(): void
    {
        // Arrange
        $this->createExportServer();

        // Act
        (new ImageRenderer(1))->render(new Graph(), [], $this->binDirectory . DIRECTORY_SEPARATOR . 'graph.png');

        // Assert
        $this->assertCount(1, $this->getExportServerCalls());
    }

    public function test_render_fails_with_the_output_of_the_export_server(): void
    {
        // Arrange
        $this->createExportServerThatFails('The chart could not be rendered');

        // Assert
        $this->expectException(RenderingException::class);
        $this->expectExceptionMessage('The chart could not be rendered');

        // Act
        (new ImageRenderer(1))->render(new Graph(), [], $this->binDirectory . DIRECTORY_SEPARATOR . 'graph.png');
    }

    public function test_render_fails_with_the_output_of_the_export_server_when_it_has_to_be_killed(): void
    {
        // Arrange
        $this->createExportServerThatHangs(true);

        // Assert
        $this->expectException(ProcessFailedException::class);
        $this->expectExceptionMessage('Rendering the chart');

        // Act
        (new ImageRenderer(1))->render(new Graph(), [], $this->binDirectory . DIRECTORY_SEPARATOR . 'graph.png');
    }

    public function test_render_fails_with_only_the_end_of_a_long_output(): void
    {
        // Arrange
        $this->createExportServerThatFailsWithLongOutput();

        // Act
        try {
            (new ImageRenderer(1))->render(new Graph(), [], $this->binDirectory . DIRECTORY_SEPARATOR . 'graph.png');
            $this->fail('The render did not fail.');
        } catch (RenderingException $exception) {
            // Assert
            $this->assertStringContainsString('The last line', $exception->getMessage());
            $this->assertStringNotContainsString('The first line', $exception->getMessage());
        }
    }

    public function test_render_batch_renders_every_graph_in_one_export_server_call(): void
    {
        // Arrange
        $this->createExportServer();
        $graphs = [
            $this->getOutputPath('first/graph.png')  => $this->createGraph('First'),
            $this->getOutputPath('second/graph.png') => $this->createGraph('Second'),
        ];

        // Act
        $outputPaths = (new ImageRenderer(1, 1))->renderBatch($graphs);

        // Assert
        $this->assertCount(1, $this->getExportServerCalls());
        $this->assertSame(array_keys($graphs), $outputPaths);
        $this->assertStringContainsString('First', file_get_contents($this->getOutputPath('first/graph.png')));
        $this->assertStringContainsString('Second', file_get_contents($this->getOutputPath('second/graph.png')));
    }

    public function test_render_batch_returns_only_the_graphs_that_got_an_image_in_this_call(): void
    {
        // Arrange
        $this->createExportServer();
        file_put_contents($this->getOutputPath('failed.png'), 'An image of an earlier render');

        // Act
        $outputPaths = (new ImageRenderer(1, 1))->renderBatch([
            $this->getOutputPath('rendered.png') => $this->createGraph('Rendered'),
            $this->getOutputPath('failed.png')   => $this->createGraph(self::TITLE_WITHOUT_IMAGE),
        ]);

        // Assert
        $this->assertSame([$this->getOutputPath('rendered.png')], $outputPaths);
    }

    public function test_render_batch_does_not_use_an_empty_image(): void
    {
        // Arrange
        $this->createExportServer();

        // Act
        $outputPaths = (new ImageRenderer(1, 1))->renderBatch([$this->getOutputPath('graph.png') => $this->createGraph(self::TITLE_WITH_EMPTY_IMAGE)]);

        // Assert
        $this->assertSame([], $outputPaths);
        $this->assertFileDoesNotExist($this->getOutputPath('graph.png'));
    }

    public function test_render_batch_uses_no_image_of_an_export_server_that_ends_with_an_error(): void
    {
        // Arrange
        $this->createExportServer(1);

        // Act
        $outputPaths = (new ImageRenderer(1, 1))->renderBatch([
            $this->getOutputPath('rendered.png') => $this->createGraph('Rendered'),
            $this->getOutputPath('failed.png')   => $this->createGraph(self::TITLE_WITHOUT_IMAGE),
        ]);

        // Assert
        $this->assertSame([], $outputPaths);
        $this->assertFileDoesNotExist($this->getOutputPath('rendered.png'));
    }

    public function test_render_batch_fails_when_the_export_server_has_to_be_stopped(): void
    {
        // Arrange
        $this->createExportServerThatHangs(false);

        // Assert
        $this->expectException(ExportServerFailedException::class);
        $this->expectExceptionMessage('Rendering the chart');

        // Act
        (new ImageRenderer(1, 1))->renderBatch([$this->getOutputPath('graph.png') => $this->createGraph('Graph')]);
    }

    public function test_render_batch_gives_the_export_server_four_pages(): void
    {
        // Arrange
        $this->createExportServer();

        // Act
        (new ImageRenderer(1, 1))->renderBatch([$this->getOutputPath('graph.png') => $this->createGraph('Graph')]);

        // Assert
        $this->assertStringContainsString('--minWorkers 4 --maxWorkers 4', $this->getExportServerCalls()[0]);
    }

    public function test_render_batch_gives_the_export_server_longer_limits_in_a_config_file(): void
    {
        // Arrange
        $this->createExportServer();

        // Act
        (new ImageRenderer(1, 7))->renderBatch([
            $this->getOutputPath('first.png')  => $this->createGraph('First'),
            $this->getOutputPath('second.png') => $this->createGraph('Second'),
        ]);

        // Assert
        $config = $this->getExportServerConfig();
        $this->assertSame(7000, $config['pool']['acquireTimeout']);
        $this->assertSame(2, $config['pool']['queueLimit']);
        $this->assertSame(ImageRenderer::BATCH_SCREENSHOT_TIMEOUT_MILLISECONDS, $config['export']['rasterizationTimeout']);
    }

    public function test_render_batch_keeps_the_settings_of_the_highcharts_loadconfig_file(): void
    {
        // Arrange
        $this->createExportServer();
        $loadConfigPath = $this->binDirectory . DIRECTORY_SEPARATOR . 'highcharts.json';
        file_put_contents($loadConfigPath, json_encode(['puppeteer' => ['args' => ['--no-sandbox']], 'pool' => ['workLimit' => 10]]));
        putenv(ImageRenderer::ENV_HIGHCHARTS_LOADCONFIG . '=' . $loadConfigPath);

        // Act
        (new ImageRenderer(1, 7))->renderBatch([$this->getOutputPath('graph.png') => $this->createGraph('Graph')]);

        // Assert
        $config = $this->getExportServerConfig();
        $this->assertSame(['--no-sandbox'], $config['puppeteer']['args']);
        $this->assertSame(10, $config['pool']['workLimit']);
        $this->assertSame(7000, $config['pool']['acquireTimeout']);
    }

    public function test_render_batch_removes_its_temporary_files(): void
    {
        // Arrange
        $this->createExportServer();

        // Act
        (new ImageRenderer(1, 1))->renderBatch([
            $this->getOutputPath('rendered.png') => $this->createGraph('Rendered'),
            $this->getOutputPath('failed.png')   => $this->createGraph(self::TITLE_WITHOUT_IMAGE),
        ]);

        // Assert
        preg_match('/--batch ([^=]+)=/', $this->getExportServerCalls()[0], $matches);
        $this->assertDirectoryDoesNotExist(dirname($matches[1]));
    }

    public function test_render_batch_without_graphs_starts_no_export_server(): void
    {
        // Arrange
        $this->createExportServer();

        // Act
        $outputPaths = (new ImageRenderer(1, 1))->renderBatch([]);

        // Assert
        $this->assertSame([], $outputPaths);
        $this->assertSame([], $this->getExportServerCalls());
    }

    /*****************************************************************************/
    /* Helpers
    /*****************************************************************************/

    /**
     * Writes the chart's input as its image, alone or in a batch, and records its arguments and config file.
     */
    private function createExportServer(int $exitCode = 0): void
    {
        $script = $this->binDirectory . DIRECTORY_SEPARATOR . ImageRenderer::CMD_HIGHCHARTS_EXPORT_SERVER;

        file_put_contents($script, implode(PHP_EOL, [
            '#!/bin/sh',
            'directory="$(dirname "$0")"',
            'echo "$*" >> "$directory/calls"',
            'while [ "$#" -gt 0 ]; do',
            '  case "$1" in',
            '    -infile) infile="$2" ;;',
            '    -outfile) pairs="$infile=$2" ;;',
            '    --batch) pairs="$2" ;;',
            '    --loadConfig) cp "$2" "$directory/config.json" ;;',
            '  esac',
            '  shift',
            'done',
            "IFS=';'",
            'for pair in $pairs; do',
            '  infile="${pair%%=*}"',
            '  outfile="${pair#*=}"',
            sprintf('  if grep -q %s "$infile"; then continue; fi', escapeshellarg(self::TITLE_WITHOUT_IMAGE)),
            sprintf('  if grep -q %s "$infile"; then : > "$outfile"; continue; fi', escapeshellarg(self::TITLE_WITH_EMPTY_IMAGE)),
            '  cp "$infile" "$outfile"',
            'done',
            sprintf('exit %d', $exitCode),
        ]));
        chmod($script, 0755);
    }

    private function createExportServerThatHangs(bool $ignoresStopSignal): void
    {
        $script = $this->binDirectory . DIRECTORY_SEPARATOR . ImageRenderer::CMD_HIGHCHARTS_EXPORT_SERVER;

        file_put_contents($script, implode(PHP_EOL, [
            '#!/bin/sh',
            $ignoresStopSignal ? "trap '' TERM" : '',
            'echo $$ > "$(dirname "$0")/pid"',
            'echo "Rendering the chart"',
            'exec sleep 120',
        ]));
        chmod($script, 0755);
    }

    /**
     * Like the real export server: the browser runs in its own session, out of reach of timeout, and is only closed after a log line is written on the stop signal.
     */
    private function createExportServerWithBrowser(): void
    {
        $script = $this->binDirectory . DIRECTORY_SEPARATOR . ImageRenderer::CMD_HIGHCHARTS_EXPORT_SERVER;

        file_put_contents($script, implode(PHP_EOL, [
            '#!/bin/sh',
            'directory="$(dirname "$0")"',
            'setsid sh -c \'echo $$ > "$0"; exec sleep 120\' "$directory/browser_pid" &',
            'while [ ! -s "$directory/browser_pid" ]; do sleep 0.1; done',
            'trap \'while ! echo "Closing the browser"; do sleep 1; done; kill "$(cat "$directory/browser_pid")"; exit 0\' TERM',
            'echo $$ > "$directory/pid"',
            'sleep 120 &',
            'wait',
        ]));
        chmod($script, 0755);
    }

    private function createExportServerThatFails(string $error): void
    {
        $script = $this->binDirectory . DIRECTORY_SEPARATOR . ImageRenderer::CMD_HIGHCHARTS_EXPORT_SERVER;

        file_put_contents($script, implode(PHP_EOL, [
            '#!/bin/sh',
            sprintf('echo %s >&2', escapeshellarg($error)),
            'exit 1',
        ]));
        chmod($script, 0755);
    }

    private function createExportServerThatFailsWithLongOutput(): void
    {
        $script = $this->binDirectory . DIRECTORY_SEPARATOR . ImageRenderer::CMD_HIGHCHARTS_EXPORT_SERVER;

        file_put_contents($script, implode(PHP_EOL, [
            '#!/bin/sh',
            'echo "The first line"',
            sprintf('i=0; while [ $i -lt %d ]; do echo "A line in between"; i=$((i + 1)); done', ImageRenderer::ERROR_OUTPUT_MAX_BYTES / 10),
            'echo "The last line" >&2',
            'exit 1',
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

    private function getBrowserPid(): int
    {
        return (int)file_get_contents($this->binDirectory . DIRECTORY_SEPARATOR . 'browser_pid');
    }

    /**
     * @return string[] The arguments of each call
     */
    private function getExportServerCalls(): array
    {
        $calls = $this->binDirectory . DIRECTORY_SEPARATOR . 'calls';

        return is_file($calls) ? file($calls, FILE_IGNORE_NEW_LINES) : [];
    }

    private function getExportServerConfig(): array
    {
        return json_decode(file_get_contents($this->binDirectory . DIRECTORY_SEPARATOR . 'config.json'), true);
    }

    private function getOutputPath(string $name): string
    {
        return $this->binDirectory . DIRECTORY_SEPARATOR . $name;
    }

    private function createGraph(string $title): Graph
    {
        $graph = new Graph();
        $graph->getTitle()->setText($title);

        return $graph;
    }

    private function isRunning(int $pid): bool
    {
        $stat = @file_get_contents(sprintf('/proc/%d/stat', $pid));

        // A killed process stays a zombie until its new parent collects it, but it is no longer running
        return $stat !== false && substr($stat, strrpos($stat, ')') + 2, 1) !== 'Z';
    }
}
