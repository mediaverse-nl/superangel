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

Route::get('/', "GuestController@index");

Route::get('/inloggen', "GuestController@login");
Route::post('/inloggen', "GuestController@handleLogin");
Route::get('/uitloggen', "GuestController@logout");
Route::get('/registreren', "GuestController@register");
Route::post('/registreren', "GuestController@handleRegister");

Route::get('/mijn-gegevens', 'UserController@profile');