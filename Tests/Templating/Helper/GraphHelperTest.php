<?php

namespace Tests\Validaide\HighChartsBundle\Templating\Helper;

use Validaide\HighChartsBundle\Graph;
use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Templating\Helper\GraphHelper;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

class GraphHelperTest extends TestCase
{
    private GraphHelper $graphHelper;


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