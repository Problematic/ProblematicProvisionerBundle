<?php

namespace Problematic\ProvisionerBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;

class ProblematicProvisionerExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        
        $container->setParameter('problematic_provisioner.redis.key', $config['redis']['key']);

        $container->setAlias('problematic_provisioner.redis.client', $config['redis']['client']);
        $container->setAlias('problematic_provisioner.provisioner', $config['provisioner']);

        $loader->load('services.yml');
    }

}
