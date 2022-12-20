<?php

namespace Tests\Validaide\HighChartsBundle;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph;

class GraphTest extends TestCase
{
    private ?Graph $graph = null;


    protected function setUp(): void
    {
        parent::setUp();

        $this->graph = new Graph();
    }


    protected function tearDown(): void
    {
        $this->graph = null;

        parent::tearDown();
    }

    /*****************************************************************************/
    /* Tests
    /*****************************************************************************/

    public function testGraph()
    {
        $this->assertInstanceOf(Graph::class, $this->graph);
    }
}