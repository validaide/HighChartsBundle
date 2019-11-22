<?php

namespace Validaide\HighChartsBundle\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Validaide\HighChartsBundle\HighChartsBundle;
use Validaide\HighChartsBundle\Templating\Renderer\GraphRenderer;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {
        $kernel = new HighChartsBundleTestingKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $graphRenderer = $container->get(GraphRenderer::class);
        $this->assertInstanceOf(GraphRenderer::class, $graphRenderer);
    }
}

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class HighChartsBundleTestingKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return [
            new HighChartsBundle(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {

    }
}
