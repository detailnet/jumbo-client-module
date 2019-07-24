<?php

namespace Jumbo\Client\Factory\Options;

use Jumbo\Client\Exception\RuntimeException;
use Jumbo\Client\Options\ModuleOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['jumbo_client'])) {
            throw new RuntimeException('Config for Jumbo\Client is not set');
        }

        return new ModuleOptions($config['jumbo_client']);
    }
}
