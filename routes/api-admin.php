<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('ApiAdmin')->group(function () {
    Route::post('login','Auth\AuthController@login');
    Route::middleware( ['auth:api','role:admin'])->group(function (){
        Route::post('logout','Auth\AuthController@logout');

        //--------------------------------Client-------------------------------------//

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

        });
    });
});



