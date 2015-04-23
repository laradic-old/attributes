<?php

Route::get('attributes/datatable', ['as' => 'laradic.admin.attributes.datatable', 'uses' => 'AttributeController@getDatatable']);
$pre = 'laradic.admin.attributes.';
Route::resource('attributes', 'AttributeController', [
    'except' => ['create', 'edit'],
    'names'  => [
        'index'   => "${pre}index",
        'show'    => "${pre}show",
        'store'   => "${pre}store",
        'update'  => "${pre}update",
        'destroy' => "${pre}destroy",
    ]
]);
