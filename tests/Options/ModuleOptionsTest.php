<?php

namespace JumboTest\Client\Options;

use Jumbo\Client\Options\Client\ClientOptions;
use Jumbo\Client\Options\ModuleOptions;

class ModuleOptionsTest extends OptionsTestCase
{
    /** @var ModuleOptions */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            ModuleOptions::CLASS,
            [
                'getClient',
                'getClients',
                'setClients',
            ]
        );
    }

    public function testOptionsExist(): void
    {
        $this->assertInstanceOf(ModuleOptions::CLASS, $this->options);
    }

    public function testClientCanBeSet(): void
    {
        $clientConfig = [
            'base_uri' => 'http://some.client.com',
            'app_id' => 'Some-App-ID',
            'app_key' => 'Some-App-Key',
        ];

        $clientName = 'SomeClient';
        $clientsConfig = [
            $clientName => $clientConfig,
        ];

        $this->assertTrue(is_array($this->options->getClients()));
        $this->assertCount(0, $this->options->getClients());
        $this->assertNull($this->options->getClient('UnknownClient'));

        $this->options->setClients($clientsConfig);

        $this->assertCount(1, $this->options->getClients());

        $clientOptions = $this->options->getClient($clientName);

        $this->assertInstanceOf(ClientOptions::CLASS, $clientOptions);
        $this->assertEquals($clientConfig['base_uri'], $clientOptions->getBaseUri());
        $this->assertEquals($clientConfig['app_id'], $clientOptions->getAppId());
        $this->assertEquals($clientConfig['app_key'], $clientOptions->getAppKey());
    }
}
