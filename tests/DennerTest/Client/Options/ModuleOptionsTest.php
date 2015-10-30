<?php

namespace DennerTest\Client\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\Locale\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Denner\Client\Options\ModuleOptions',
            array(
                'getNavigationItems',
                'setNavigationItems',
                'getListeners',
                'setListeners',
            )
        );
    }

    public function testOptionsExist()
    {
        $this->assertInstanceOf('Denner\Client\Options\ModuleOptions', $this->options);
    }

    public function testNavigationItemsCanBeSet()
    {
        $this->assertEquals(array(), $this->options->getNavigationItems());

        $navigationItems = array('de_CH' => 'DE');

        $this->options->setNavigationItems($navigationItems);

        $this->assertEquals($navigationItems, $this->options->getNavigationItems());
    }

    public function testListenersCanBeSet()
    {
        $this->assertEquals(array(), $this->options->getListeners());

        $listeners = array('Some\Listener\Class');

        $this->options->setListeners($listeners);

        $this->assertEquals($listeners, $this->options->getListeners());
    }
}
