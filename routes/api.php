<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Items route
    Route::get('items', 'App\Http\Controllers\ItemsController@index');
    Route::post('items', 'App\Http\Controllers\ItemsController@store');
    Route::put('items/{id}', 'App\Http\Controllers\ItemsController@update');
    Route::delete('items/{id}', 'App\Http\Controllers\ItemsController@destroy');

//Category route
    Route::get('categories', 'App\Http\Controllers\CategoriesController@index');
    Route::put('categories/{id}', 'App\Http\Controllers\CategoriesController@update');
    Route::post('categories', 'App\Http\Controllers\CategoriesController@store');
    Route::delete('categories/{id}', 'App\Http\Controllers\CategoriesController@destroy');