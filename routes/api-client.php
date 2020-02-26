<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ApiClient')->group(function () {
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:client'])->group(function () {
        Route::get('overview', 'Overview\OverviewController@index');
        Route::post('logout', 'Auth\AuthController@logout');
    });
});



