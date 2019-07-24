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
        $clientName = 'SomeClient';
        $clientsConfig = [
            $clientName => [
                'base_uri' => 'http://some.client.com',
            ],
        ];

        $this->assertTrue(is_array($this->options->getClients()));
        $this->assertCount(0, $this->options->getClients());
        $this->assertNull($this->options->getClient('UnknownClient'));

        $this->options->setClients($clientsConfig);

        $this->assertCount(1, $this->options->getClients());
        $this->assertInstanceOf(ClientOptions::CLASS, $this->options->getClient($clientName));
    }
}
