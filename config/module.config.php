<?php

return [
    'service_manager' => [
        'abstract_factories' => [
            'Jumbo\Client\Factory\Client\ClientFactory',
        ],
        'aliases' => [
        ],
        'invokables' => [
        ],
        'factories' => [
            'Jumbo\Client\Options\ModuleOptions' => 'Jumbo\Client\Factory\Options\ModuleOptionsFactory',
        ],
        'initializers' => [
        ],
        'shared' => [
        ],
    ],
    'jumbo_client' => [
        'clients' => [
        ],
    ],
];
