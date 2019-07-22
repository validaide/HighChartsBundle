<?php

namespace Tests\Validaide\HighChartsBundle\Templating\Helper;

use Validaide\HighChartsBundle\Graph;
use PHPUnit\Framework\TestCase;
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
        $this->graphHelper = new GraphHelper(new GraphRenderer());
    }

    /**
     *
     */
    public function testGraphHelper()
    {
        $this->assertInstanceOf(GraphHelper::class, $this->graphHelper);
    }
}