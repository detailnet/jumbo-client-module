<?php

namespace Denner\Client\Options;

use Detail\Core\Options\AbstractOptions;

use Denner\Client\WebModule\Options\Client\ClientOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var ClientOptions[]
     */
    protected $clients;

    /**
     * @param null|string $name
     * @return ClientOptions|ClientOptions[]
     */
    public function getServices($name = null)
    {
        if ($name) {
            return isset($this->services[$name]) ? $this->services[$name] : null;
        }

        return $this->services;
    }

    /**
     * @param array $clients
     */
    public function setServices(array $clients)
    {
        $this->clients = $clients;
    }
}
