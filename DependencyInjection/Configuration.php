<?php

namespace LSB\NumerationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @codeCoverageIgnore
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const CONFIG_KEY = 'lsb_numeration';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_KEY);

        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                // patterns
                ->arrayNode('patterns')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('name')->end()
                            ->scalarNode('pattern')->end()
                        ->end()
                    ->end()
                ->end()


                // counter_configs
                ->arrayNode('counter_configs')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('name')->end()
                            ->scalarNode('patternName')->end()
                            ->scalarNode('start')->end()
                            ->scalarNode('step')->end()
                            ->scalarNode('time_context')->end() //TODO enum?
                            ->scalarNode('context_object_fqcn')->end()
                        ->end()
                    ->end()
                ->end()

            ->end();

        return $treeBuilder;
    }
}
