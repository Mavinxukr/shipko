<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ApiClient')->group(function () {
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:client'])->group(function () {
        Route::get('overview', 'Overview\OverviewController@index');
        Route::post('logout', 'Auth\AuthController@logout');
        Route::namespace('Auto')->group(function () {
            Route::get('get-autos', 'AutoController@index');
            Route::get('get-auto/{id}', 'AutoController@show');

            Route::get('get-autos-shipping','AutoShippingController@index');
            Route::get('get-autos-dismanting', 'AutoDismantingController@index');
        });

        Route::namespace('Invoice')->group(function () {
            Route::get('get-invoices', 'InvoiceController@index');
        });

    });
});



