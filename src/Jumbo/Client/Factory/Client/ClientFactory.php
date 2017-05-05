<?php

namespace Jumbo\Client\Factory\Client;

use ReflectionClass;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Jumbo\Client\JumboClient;
use Jumbo\Client\Exception;
use Jumbo\Client\Options\Client\ClientOptions;
use Jumbo\Client\Options\ModuleOptions;

class ClientFactory implements
    AbstractFactoryInterface
{
    /**
     * Cache of canCreateServiceWithName lookups.
     *
     * @var array
     */
    protected $lookupCache = array();

    /**
     * Determine if we can create a service with name.
     *
     * @param ServiceLocatorInterface $services
     * @param string $name
     * @param string $requestedName
     * @return boolean
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $services, $name, $requestedName)
    {
        if (array_key_exists($requestedName, $this->lookupCache)) {
            return $this->lookupCache[$requestedName];
        }

        $clientExists = $this->clientExists($requestedName);

        $this->lookupCache[$requestedName] = $clientExists;

        return $clientExists;
    }

    /**
     * Create service with name.
     *
     * @param ServiceLocatorInterface $services
     * @param string $name
     * @param string $requestedName
     * @return JumboClient
     */
    public function createServiceWithName(ServiceLocatorInterface $services, $name, $requestedName)
    {
        $clientOptions = $this->getClientOptions($services, $requestedName);

        if (!$this->clientExists($requestedName)) {
            throw new Exception\ConfigException(
                sprintf('Client "%s" does not exist', $requestedName)
            );
        }

        /** @var JumboClient $requestedName*/

        $appliedClientOptions = array();

        // Only pass along options which are actually set
        if ($clientOptions !== null) {
            $appliedClientOptions = array_filter($clientOptions->toArray(), function ($value) {
                return $value !== null;
            });
        }

        $client = $requestedName::factory($appliedClientOptions);

        return $client;
    }

    /**
     * @param string $clientClass
     * @return boolean
     */
    protected function clientExists($clientClass)
    {
        // Class name must start with "Jumbo\Client"
        if (strpos($clientClass, 'Jumbo\Client') !== 0) {
            return false;
        }

        if (!class_exists($clientClass)) {
            return false;
        }

        $reflectionClass = new ReflectionClass($clientClass);

        return $reflectionClass->isSubclassOf(JumboClient::CLASS);
    }

    /**
     * @param ServiceLocatorInterface $services
     * @param string $clientName
     * @return ClientOptions
     */
    protected function getClientOptions(ServiceLocatorInterface $services, $clientName)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $services->get(ModuleOptions::CLASS);
        $clientOptions = $moduleOptions->getClient($clientName);

        return $clientOptions;
    }
}
