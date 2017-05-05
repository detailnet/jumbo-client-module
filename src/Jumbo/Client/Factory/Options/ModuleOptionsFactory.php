<?php

namespace Jumbo\Client\Factory\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Jumbo\Client\Exception\ConfigException;
use Jumbo\Client\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['jumbo_client'])) {
            throw new ConfigException('Config for Jumbo\Client is not set');
        }

        return new ModuleOptions($config['jumbo_client']);
    }
}
