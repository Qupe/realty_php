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

Route::get('/', 'Home\HomeController@render');

/* Agency */
Route::get('/agencies/agency/{id}', 'Agency\AgencyController@render')->where('id', '[0-9]+');
Route::get('/agencies/', 'Agency\AgenciesController@render');

/* Developer */
Route::get('/developer/{id}', 'Developer\DeveloperController@render')->where('id', '[0-9]+');
Route::get('/developers/', 'Developer\DevelopersController@render');

/* Realtor */
Route::get('/realtor/{id}', 'Realtor\RealtorController@render')->where('id', '[0-9]+');
Route::get('/realtors', 'Realtor\RealtorsController@render');

/* Realty */
Route::get('/realty', 'Realty\RealtyController@render');
Route::get('/realty/{id}', 'Realty\RealtyObjectController@render')->where('id', '[0-9]+');
Route::get('/realty/add', 'Realty\RealtyAddController@render')->middleware('auth');
Route::post('/realty/add', 'Realty\RealtyAddController@add')->middleware('auth');
Route::get('/realty/edit/{id}', 'Realty\RealtyEditController@render')->where('id', '[0-9]+')->middleware('auth');
Route::post('/realty/edit/{id}', 'Realty\RealtyEditController@edit')->where('id', '[0-9]+')->middleware('auth');

/* Login, register, password reset */
Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');