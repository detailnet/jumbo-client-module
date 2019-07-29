<?php

namespace Jumbo\Client\Service;

use Jumbo\Client\AssetsClient as Client;

trait AssetsClientAwareTrait
{
    /** @var Client */
    protected $assetsClient;

    /**
     * @return Client
     */
    public function getAssetsClient(): Client
    {
        return $this->assetsClient;
    }

    public function setAssetsClient(Client $assetsClient): void
    {
        $this->assetsClient = $assetsClient;
    }
}
