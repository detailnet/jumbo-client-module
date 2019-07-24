<?php

namespace Jumbo\Client\Factory\Options;

use Interop\Container\ContainerInterface;
use Jumbo\Client\Exception\RuntimeException;
use Jumbo\Client\Options\ModuleOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements
    FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ModuleOptions
    {
        $config = $container->get('Config');

        if (!isset($config['jumbo_client'])) {
            throw new RuntimeException('Config for Jumbo\Client is not set');
        }

        return new ModuleOptions($config['jumbo_client']);
    }

    /**
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, ModuleOptions::class);
    }
}
