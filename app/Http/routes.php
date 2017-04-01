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
Route::get('/agency/{id}', 'Agency\AgencyController@render');
Route::get('/agencies/', 'Agency\AgenciesController@render');
Route::get('/developer/{id}', 'Developer\DeveloperController@render');
Route::get('/developers/', 'Developer\DevelopersController@render');
Route::get('/realtor/{id}', 'Realtor\RealtorController@render');
Route::get('/realtors/', 'Realtor\RealtorsController@render');
Route::auth('/login', 'Auth\AuthController@showLoginForm');