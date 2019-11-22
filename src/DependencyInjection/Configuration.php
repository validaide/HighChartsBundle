<?php

namespace Validaide\HighChartsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('validaide_high_charts');
        $rootNode    = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->booleanNode('json_pretty_print')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }
}
