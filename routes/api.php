<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['token'],
    'prefix'     => 'v1',
    'as'         => 'api.v1.',
    'namespace'  => 'Api\v1',
], function () {
    Route::get('/rates', 'RateController@index')->name('rate.index');
});


