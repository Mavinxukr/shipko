<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ApiClient')->group(function () {
    Route::post('register','Auth\AuthController@register');
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:client'])->group(function () {
        Route::get('overview', 'Overview\OverviewController@index');
        Route::get('notifications', 'Notification\NotificationController@index');
        Route::post('notifications/create', 'Notification\NotificationController@store');
        Route::post('notifications', 'Notification\NotificationController@update');
        Route::post('logout', 'Auth\AuthController@logout');
        Route::namespace('Auto')->group(function () {
            Route::get('get-autos', 'AutoController@index');
            Route::get('get-auto/{id}', 'AutoController@show');

            Route::get('get-autos-shipping','AutoShippingController@index');
            Route::get('get-autos-dismanting', 'AutoDismantingController@index');
        });

        Route::namespace('Part')->group(function () {
            Route::post('store-part','PartController@store');
            Route::get('get-parts','PartController@index');
            Route::get('get-part/{id}','PartController@show');
            Route::post('update-part/{id}','PartController@update');
            Route::delete('delete-part/{id}','PartController@destroy');
            Route::delete('delete-part-images/{id}','PartController@removeImage');
            Route::post('restore-part-images/{id}','PartController@restoreImage');
        });

        Route::namespace('Invoice')->group(function () {
            Route::get('get-invoices', 'InvoiceController@index');
        });

        Route::namespace('Profile')->group(function () {
            Route::get('get-profile', 'ProfileController@index');
            Route::post('update-profile', 'ProfileController@update');
            //Route::post('update-profile-password', 'ProfileController@updatePassword');
        });
    });
});



