<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'Jumbo\Client\Factory\Client\ClientFactory',
        ),
        'aliases' => array(
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'Jumbo\Client\Options\ModuleOptions' => 'Jumbo\Client\Factory\Options\ModuleOptionsFactory',
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
    'jumbo_client' => array(
        'clients' => array(
        ),
    ),
);
