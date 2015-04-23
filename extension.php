<?php

use Illuminate\Contracts\Foundation\Application;
use Laradic\Extensions\Extension;
use Laradic\Extensions\ExtensionFactory;

return array(
    'name' => 'Attributes',
    'slug' => 'laradic-admin/attributes',
    'dependencies' => [
        'laradic/admin'
    ],
    'register' => function(Application $app, Extension $extension, ExtensionFactory $extensions)
    {
        $app->register('LaradicAdmin\Attributes\AttributesServiceProvider');
    },
    'boot' => function(Application $app, Extension $extension, ExtensionFactory $extensions)
    {

    },
    'install' => function(Application $app, Extension $extension, ExtensionFactory $extensions)
    {
        $app->register('LaradicAdmin\Attributes\AttributesServiceProvider');
    },
    'uninstall' => function(Application $app, Extension $extension, ExtensionFactory $extensions)
    {

    }
);
