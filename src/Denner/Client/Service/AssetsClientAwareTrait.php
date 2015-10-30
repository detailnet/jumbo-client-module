<?php

namespace Denner\Client\Service;

use Denner\Client\AssetsClient;

trait AssetsClientAwareTrait
{
    /**
     * @var AssetsClient
     */
    protected $assetsClient;

    /**
     * @return AssetsClient
     */
    public function getAssetsClient()
    {
        return $this->assetsClient;
    }

    /**
     * @param AssetsClient $assetsClient
     */
    public function setAssetsClient(AssetsClient $assetsClient)
    {
        $this->assetsClient = $assetsClient;
    }
}
