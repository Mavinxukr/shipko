<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ApiClient')->group(function () {
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:client'])->group(function () {
        Route::post('logout', 'Auth\AuthController@logout');

        Route::namespace('Auto')->group(function () {
            Route::get('get-autos', 'AutoController@index');
            Route::get('get-auto/{id}', 'AutoController@show');
        });
    });
});



