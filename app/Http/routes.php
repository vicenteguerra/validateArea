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

/* API */

Route::any('/api/v1/polygon/{id}', 'api\v1\ValidateAreaController@polygon');
Route::any('/api/v1/user/{id}', 'api\v1\ValidateAreaController@user');
Route::get('/api/v1/polygon/{id}/points', 'api\v1\PolygonController@points');
Route::get('/api/v1/user/{id}/points', 'api\v1\UserController@points');
Route::get('/api/v1/user/{id}/requests', 'api\v1\UserController@requests');

/* ADMIN */

Route::post('/polygon', 'PolygonController@create')->name('create');
Route::post('/polygon/update', 'PolygonController@update')->name('update');
Route::post('/polygon/delete', 'PolygonController@delete')->name('delete');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/create', 'HomeController@create');
Route::get('/test', 'HomeController@test');

Route::any('/{any}', function () {
    return view('errors/503');
})->where('any','.*');
