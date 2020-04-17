<?php

use Illuminate\Support\Facades\Route;

Route::get('parser/{table}', 'ApiAdmin\Parser\ParserController@index');

Route::namespace('ApiAdmin')->group(function () {
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:api','role:admin'])->group(function (){
        Route::post('logout','Auth\AuthController@logout');
        Route::get('download', 'Document\DocumentController@index');
        Route::post('store-note', 'Auto\AutoNoteController@store');
        Route::post('parser/{table}', 'Parser\ParserController@index');

        Route::namespace('Client')->group(function () {
            Route::post('store-client','ClientController@store');
            Route::get('get-client/{id}','ClientController@show');
            Route::get('get-clients','ClientController@index');
            Route::post('update-client/{id}','ClientController@update');
            Route::post('delete-client','ClientController@delete');
            Route::delete('delete-client/{id}','ClientController@destroy');
            Route::get('get-clients-by-filters','ClientFilterController@filter' );
        });
        Route::namespace('Part')->group(function () {
            Route::post('store-part','PartController@store');
            Route::get('get-parts','PartController@index');
            Route::get('get-part/{id}','PartController@show');
            Route::post('update-part/{id}','PartController@update');
            Route::delete('delete-part/{id}','PartController@destroy');
            Route::post('delete-part-images/{id}','PartController@removeImage');
            Route::post('restore-part-images/{id}','PartController@restoreImage');
        });
        Route::namespace('Auto')->group(function () {
            Route::post('store-auto','AutoController@store');
            Route::get('get-autos','AutoController@index');
            Route::get('get-autos-by-container','AutoController@autoByContainer');
            Route::get('get-auto/{id}','AutoController@show');
            Route::post('delete-auto','AutoController@delete');
            Route::delete('delete-auto/{id}','AutoController@destroy');
            Route::post('restore-auto-document/{id}','AutoController@restoreDocument');
            Route::post('delete-auto-document/{id}','AutoController@deleteDocument');
            Route::post('update-auto/{id}','AutoController@update');

            Route::post('store-auto-shipping','AutoShippingController@store');
            Route::get('get-autos-shipping','AutoShippingController@index');
            Route::get('get-auto-shipping/{id}','AutoShippingController@show');
            Route::post('update-auto-shipping/{id}','AutoShippingController@update');

            Route::get('get-autos-dismanting','AutoDismantingController@index');
            Route::get('get-auto-dismanting/{id}','AutoDismantingController@show');
            Route::post('update-auto-dismanting/{id}','AutoDismantingController@update');
        });
        Route::namespace('Invoice')->group(function () {
            Route::get('get-invoices','InvoiceController@index');
            Route::get('get-invoice/{id}','InvoiceController@show');
            Route::post('store-invoice','InvoiceController@store');
            Route::post('update-invoice/{id}','InvoiceController@update');
            Route::delete('delete-invoice/{id}','InvoiceController@delete');
            Route::post('restore-invoice-document/{id}','InvoiceController@restoreDocument');
            Route::post('delete-invoice-document/{id}','InvoiceController@deleteDocument');
        });
        Route::namespace('Group')->group(function () {
            Route::post('store-group','GroupController@store');
            Route::get('get-group/{id}','GroupController@show');
            Route::get('get-groups','GroupController@index');
            Route::post('update-group/{id}','GroupController@update');
            Route::delete('delete-group/{id}','GroupController@destroy');
        });
        Route::namespace('Price')->group(function () {
            Route::post('store-price','PriceController@store');
            Route::get('get-price/{id}','PriceController@show');
            Route::get('get-prices','PriceController@index');
            Route::post('update-price/{id}','PriceController@update');
            Route::delete('delete-price/{id}','PriceController@destroy');
        });
    });
});



