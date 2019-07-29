<?php

namespace Jumbo\Client\Options\Client;

use Zend\Stdlib\AbstractOptions;

class ClientOptions extends AbstractOptions
{
    /** @var string */
    protected $baseUri;

    /** @var string */
    protected $appId;

    /** @var string */
    protected $appKey;

    public function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    public function setBaseUri(?string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @deprecated Use {@see getBaseUri()} instead
     */
    public function getBaseUrl(): ?string
    {
        return $this->getBaseUri();
    }

    /**
     * @deprecated Use {@see setBaseUri()} instead
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->setBaseUri($baseUrl);
    }

    public function getAppId(): ?string
    {
        return $this->appId;
    }

    public function setAppId(?string $appId): void
    {
        $this->appId = $appId;
    }

    public function getAppKey(): ?string
    {
        return $this->appKey;
    }

    public function setAppKey(?string $appKey): void
    {
        $this->appKey = $appKey;
    }
}
