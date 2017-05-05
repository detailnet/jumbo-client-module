<?php

namespace JumboTest\Client\Options;

use Jumbo\Client\Options\Client\ClientOptions;
use Jumbo\Client\Options\ModuleOptions;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            ModuleOptions::CLASS,
            array(
                'getClient',
                'getClients',
                'setClients',
            )
        );
    }

    public function testOptionsExist()
    {
        $this->assertInstanceOf(ModuleOptions::CLASS, $this->options);
    }

    public function testClientCanBeSet()
    {
        $clientName = 'SomeClient';
        $clientsConfig = array(
            $clientName => array(
                'base_url' => 'http://some.client.com',
            ),
        );

        $this->assertTrue(is_array($this->options->getClients()));
        $this->assertCount(0, $this->options->getClients());
        $this->assertNull($this->options->getClient('UnknownClient'));

        $this->options->setClients($clientsConfig);

        $this->assertCount(1, $this->options->getClients());
        $this->assertInstanceOf(ClientOptions::CLASS, $this->options->getClient($clientName));
    }
}
