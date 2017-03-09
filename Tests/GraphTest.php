<?php

namespace Validaide\HighChartsBundle\Tests;

use Validaide\HighChartsBundle\Graph;
use PHPUnit\Framework\TestCase;

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
    protected function setUp()
    {
        $this->graph = new Graph();
    }

    public function testGraph()
    {
        $this->assertInstanceOf(Graph::class, $this->graph);
    }
}