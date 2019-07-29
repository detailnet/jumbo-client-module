<?php

namespace JumboTest\Client;

use Jumbo\Client\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    /** @var Module */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testModuleProvidesConfig(): void
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('jumbo_client', $config);
        $this->assertTrue(is_array($config['jumbo_client']));
    }
}
