<?php

namespace Problematic\ProvisionerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('problematic_provisioner');
        $rootNode
            ->children()
                ->scalarNode('provisioner')->defaultValue('problematic_provisioner.provisioner.redis')->end()

                ->arrayNode('redis')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('client')->defaultNull()->end()
                        ->scalarNode('key')->defaultValue('provisioner_key')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }

}
