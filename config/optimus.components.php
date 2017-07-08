<?php
/**
 * This is the optimus route loader, it enables us to use a folder based structure instead of class based
 */
return [
    'namespaces' => [
        'Integrations' => base_path() . DIRECTORY_SEPARATOR . 'integrations',
        'Api\V1' => base_path() . DIRECTORY_SEPARATOR . 'api/V1',
        'Infrastructure' => base_path() . DIRECTORY_SEPARATOR . 'infrastructure',
    ],
    'protection_middleware' => [
        'throttle:300,1',
        'bindings',
    ],
    'resource_namespace' => 'resources',
    'language_folder_name' => 'lang',
    'view_folder_name' => 'views'
];
