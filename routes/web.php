<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'TaskboardsController@index');

Route::resource('taskboards', 'TaskboardsController');

Route::get('taskboards/{id}', 'TaskboardsController@show');
Route::post('taskboards', 'TaskboardsController@store');
Route::put('taskboards/{id}', 'TaskboardsController@update');
Route::delete('taskboards/{id}', 'TaskboardsController@destroy');

Route::get('taskboards/{id}', 'TaskboardsController@show');
Route::post('taskboards', 'TaskboardController@store');
Route::put('taskboards/{id}', 'TaskboardsController@update');
Route::resource('taskboards', 'TaskboardsController');