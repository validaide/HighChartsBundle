<?php

namespace Validaide\HighChartsBundle\Tests;

use Symfony\Component\Filesystem\Filesystem;
use Validaide\HighChartsBundle\Graph;
use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;
use Validaide\HighChartsBundle\Templating\Renderer\ImageRenderer;

/**
 * Class IntegrationTestCase
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class IntegrationTestCase extends TestCase
{
    /**
     * @param Graph $graph
     * @param array $replacements
     */
    protected function assertGraph(Graph $graph, array $replacements)
    {
        $reflectionClass    = new \ReflectionClass($graph);
        $expectedOutputPath = $this->getTestFilesDirectory() . DIRECTORY_SEPARATOR . $reflectionClass->getShortName() . 'Test.txt';
        $graphRenderer      = new GraphRenderer();
        $expectedOutput     = file_get_contents($expectedOutputPath);
        $renderedOutput     = $graphRenderer->render($graph);

        // Replace placeholders
        foreach ($replacements as $search => $replacement) {
            $expectedOutput = str_replace('[' . $search . ']', $replacement, $expectedOutput);
        }

        // We would like to compare the contents ourselves
        $filePrefix = $reflectionClass->getShortName() . 'Test';
        file_put_contents($filePrefix . '_expected.txt', $expectedOutput);
        file_put_contents($filePrefix . '_rendered.txt', $renderedOutput);

        // And visualize it
        $imageRenderer = new ImageRenderer('highcharts-export-server');
        $tmpFilePath   = $imageRenderer->render($graph, ['scale' => '1.5']);

        $fileSystem = new Filesystem();
        $fileSystem->copy($tmpFilePath, $filePrefix . '.png');

        $this->assertSame(
            $expectedOutput,
            $renderedOutput
        );
    }

    /**
     * @param     $input
     * @param int $repeat
     *
     * @return string
     */
    protected function traverse($input, $repeat = 1)
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

    /**
     * @param     $input
     * @param int $repeat
     *
     * @return string
     */
    protected function prependSpaces($input, $repeat = 1)
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

    /**
     * @param string $input
     *
     * @return bool
     */
    protected function containsLineBreaks(string $input): bool
    {
        return strpos($input, PHP_EOL) !== FALSE;
    }

    /**
     * @return string
     */
    protected function getTestFilesDirectory(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'Integration' . DIRECTORY_SEPARATOR . '_files';
    }
}