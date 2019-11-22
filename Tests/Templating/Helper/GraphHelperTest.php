<?php

namespace Validaide\HighChartsBundle\Tests\Templating\Helper;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class GraphHelperTest extends TestCase
{
    /**
     * @var GraphHelper
     */
    private $graphHelper;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->graphHelper = new GraphHelper(new GraphRenderer(new Serializer()));
    }

    /**
     *
     */
    public function testGraphHelper()
    {
        $this->assertInstanceOf(GraphHelper::class, $this->graphHelper);
    }
}