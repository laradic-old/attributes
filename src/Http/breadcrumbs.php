<?php

Navigation::registerBreadcrumbs(
    [
        'laradic.admin.attributes.index' => [ 'Attributes' ]

    ]
);


/*
Breadcrumbs::register('home', function (Generator $breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('home'));
});

Breadcrumbs::register('login', function (Generator $breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('sentinel.login'));
});

Breadcrumbs::register('logout', function (Generator $breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Logout', route('sentinel.logout'));
});

Breadcrumbs::register('users', function (Generator $breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('sentinel.users.index'));
});

Breadcrumbs::register('users.create', function (Generator $breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Create user', route('sentinel.users.create'));
});
*/
