<?php

namespace JumboTest\Client;

use PHPUnit\Framework\TestCase;

use Zend\Loader\StandardAutoloader;

use Jumbo\Client\Module;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testModuleProvidesAutoloaderConfig()
    {
        $config = $this->module->getAutoloaderConfig();

        $this->assertTrue(is_array($config));

        $autoloaderClass = StandardAutoloader::CLASS;

        $this->assertArrayHasKey($autoloaderClass, $config);
        $this->assertArrayHasKey('namespaces', $config[$autoloaderClass]);
        $this->assertArrayHasKey('Jumbo\Client', $config[$autoloaderClass]['namespaces']);
    }

    public function testModuleProvidesConfig()
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('jumbo_client', $config);
        $this->assertTrue(is_array($config['jumbo_client']));
    }

    public function testModuleProvidesControllerConfig()
    {
        $config = $this->module->getControllerConfig();

        $this->assertTrue(is_array($config));
    }

    public function testModuleProvidesServiceConfig()
    {
        $config = $this->module->getServiceConfig();

        $this->assertTrue(is_array($config));
    }
}
