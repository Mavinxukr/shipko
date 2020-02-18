<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ApiAdmin')->group(function () {
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:api','role:admin'])->group(function (){
        Route::post('logout','Auth\AuthController@logout');
        Route::namespace('Client')->group(function () {
            Route::post('store-client','ClientController@store');
            Route::get('get-client/{id}','ClientController@show');
            Route::get('get-clients','ClientController@index');
            Route::post('update-client/{id}','ClientController@update');
            Route::delete('delete-client/{id}','ClientController@destroy');
            Route::get('get-clients-by-filters','ClientFilterController@filter' );
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
        Route::namespace('Auto')->group(function () {
            Route::post('store-auto','AutoController@store');
            Route::get('get-autos','AutoController@index');
            Route::get('get-auto/{id}','AutoController@show');
            Route::delete('delete-auto/{id}','AutoController@delete');
            Route::post('restore-auto-document/{id}','AutoController@restoreDocument');
            Route::post('delete-auto-document/{id}','AutoController@deleteDocument');
            Route::post('update-auto/{id}','AutoController@update');
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
    });
});



