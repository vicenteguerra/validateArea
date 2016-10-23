<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/polygon', 'PolygonController@create');
Route::post('/polygon/update', 'PolygonController@update');
Route::post('/polygon/delete', 'PolygonController@delete');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/create', 'HomeController@create');
Route::get('/test', 'HomeController@test');
