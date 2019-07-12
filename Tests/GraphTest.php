<?php

namespace Tests\Validaide\HighChartsBundle;

use PHPUnit\Framework\TestCase;
use Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class GraphTest extends TestCase
{
    /**
     * @var Graph
     */
    private $graph;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->graph = new Graph();
    }

    /**
     * {@inheritdoc}
     */
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