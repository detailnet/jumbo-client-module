<?php

namespace Jumbo\Client\Service;

use Jumbo\Client\AssetsClient as Client;

trait AssetsClientAwareTrait
{
    /**
     * @var Client
     */
    protected $assetsClient;

    /**
     * @return Client
     */
    public function getAssetsClient()
    {
        return $this->assetsClient;
    }

    /**
     * @param Client $assetsClient
     */
    public function setAssetsClient(Client $assetsClient)
    {
        $this->assetsClient = $assetsClient;
    }
}
