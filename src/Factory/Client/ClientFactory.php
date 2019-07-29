<?php

namespace Jumbo\Client\Factory\Client;

use Interop\Container\ContainerInterface;
use Jumbo\Client\JumboClient;
use Jumbo\Client\Exception;
use Jumbo\Client\Options\Client\ClientOptions;
use Jumbo\Client\Options\ModuleOptions;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ReflectionClass;

class ClientFactory implements
    AbstractFactoryInterface
{
    /**
     * Cache of canCreateServiceWithName lookups.
     *
     * @var array
     */
    private $lookupCache = [];

    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (array_key_exists($requestedName, $this->lookupCache)) {
            return $this->lookupCache[$requestedName];
        }

        $clientExists = $this->clientExists($requestedName);

        $this->lookupCache[$requestedName] = $clientExists;

        return $clientExists;
    }

    /**
     * Determine if we can create a service with name.
     *
     * @param string $name
     * @param string $requestedName
     * @return boolean
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $services, $name, $requestedName)
    {
        return $this->canCreate($services, $requestedName);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): JumboClient
    {
        $clientOptions = $this->getClientOptions($container, $requestedName);

        if (!$this->clientExists($requestedName)) {
            throw new Exception\RuntimeException(
                sprintf('Client "%s" does not exist', $requestedName)
            );
        }

        /** @var JumboClient $requestedName*/

        $appliedClientOptions = [];

        // Only pass along options which are actually set
        if ($clientOptions !== null) {
            $appliedClientOptions = array_filter($clientOptions->toArray(), function ($value) {
                return $value !== null;
            });
        }

        return $requestedName::factory($appliedClientOptions);
    }

    /**
     * Create service with name.
     *
     * @param string $name
     * @param string $requestedName
     * @return JumboClient
     */
    public function createServiceWithName(ServiceLocatorInterface $services, $name, $requestedName)
    {
        return $this($services, $requestedName);
    }

    private function clientExists(string $clientClass): bool
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

    private function getClientOptions(ContainerInterface $container, string $clientName): ClientOptions
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);
        $clientOptions = $moduleOptions->getClient($clientName);

        return $clientOptions;
    }
}
