<?php

namespace Tests\Validaide\HighChartsBundle;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Filesystem\Filesystem;
use Validaide\HighChartsBundle\Graph;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;
use Validaide\HighChartsBundle\Templating\Renderer\RenderingException;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class IntegrationTestCase extends TestCase
{
    protected function assertGraph(Graph $graph, array $replacements): void
    {
        $reflectionClass   = new ReflectionClass($graph);
        $expectedInputPath = $this->getTestFilesDirectory() . DIRECTORY_SEPARATOR . $reflectionClass->getShortName() . 'Test.txt';
        $graphRenderer     = new GraphRenderer();
        $expectedOutput    = file_get_contents($expectedInputPath);
        $renderedOutput    = $graphRenderer->render($graph);

        // Replace placeholders
        foreach ($replacements as $search => $replacement) {
            $expectedOutput = str_replace('[' . $search . ']', $replacement, $expectedOutput);
        }

        // We would like to compare the contents ourselves
        $filePrefix         = $reflectionClass->getShortName() . 'Test';
        $expectedOutputPath = $this->getTestOutputDirectory() . DIRECTORY_SEPARATOR . $filePrefix . '_expected.txt';
        $renderedOutputPath = $this->getTestOutputDirectory() . DIRECTORY_SEPARATOR . $filePrefix . '_rendered.txt';
        file_put_contents($expectedOutputPath, $expectedOutput);
        file_put_contents($renderedOutputPath, $renderedOutput);

        // And visualize it
        $imageRenderer = new ImageRenderer();
        $outputPngPath = $this->getTestOutputDirectory() . DIRECTORY_SEPARATOR . $filePrefix . '.png';
        try {
            $temporaryFilePath = $imageRenderer->render($graph, [ImageRenderer::HIGHCHARTS_EXPORT_SERVER_OPTION_SCALE => '1.5'], $outputPngPath);
        } catch (RenderingException $e) {
            $this->assertFalse(true, $e->getMessage());
        }

        $this->assertSame($expectedOutput, $renderedOutput);
    }

    protected function traverse(string $input, int $repeat = 1): string
    {
        $result    = '';
        $lineCount = 0;
        $numLines  = count(preg_split('/\n|\r/', $input));
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $input) as $line) {
            $lineCount++;
            if ($lineCount == 1) {
                $result .= $line . "\n";
                continue;
            }
            if ($lineCount == $numLines) {
                $result .= $this->prependSpaces($line, $repeat - 4);
                continue;
            }

            $line   = trim($line);
            $result .= $this->prependSpaces($line, $repeat) . "\n";
        }

        return $result;
    }

    protected function prependSpaces(string $input, int $repeat = 1): string
    {
        if ($this->containsLineBreaks($input)) {
            $lines     = explode(PHP_EOL, $input);
            $prepended = '';
            foreach ($lines as $item) {
                if (strpos($item, '[') === false) {
                    $prepended .= $this->prependSpaces($item, $repeat);

                    if (strpos($item, ']') === false) {
                        $prepended .= PHP_EOL;
                    }
                } elseif ($item !== '') {
                    $prepended .= $item . PHP_EOL;
                }
            }

            return $prepended;
        } else {
            for ($count = 0; $count < $repeat; $count++) {
                $input = " " . $input;
            }

            return $input;
        }
    }

    protected function containsLineBreaks(string $input): bool
    {
        return strpos($input, PHP_EOL) !== false;
    }

    protected function getTestFilesDirectory(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'Integration' . DIRECTORY_SEPARATOR . '_files';
    }

    protected function getTestOutputDirectory(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'build';
    }
}