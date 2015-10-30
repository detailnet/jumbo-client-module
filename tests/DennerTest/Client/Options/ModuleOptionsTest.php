<?php

namespace DennerTest\Client\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var \Denner\Client\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Denner\Client\Options\ModuleOptions',
            array(
            )
        );
    }

    public function testOptionsExist()
    {
        $this->assertInstanceOf('Denner\Client\Options\ModuleOptions', $this->options);
    }
}
