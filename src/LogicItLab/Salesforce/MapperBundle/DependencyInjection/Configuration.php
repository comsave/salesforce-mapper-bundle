<?php

namespace LogicItLab\Salesforce\MapperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('logicitlab_salesforce_mapper');
        $rootNode
            ->children()
            ->scalarNode('cache_driver')->defaultValue('file')->end()
            ->arrayNode('param_converter')
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('name')
            ->prototype('scalar')->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
