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

get('/', [
	'as'   => 'show_dashboard',
	'uses' => 'WelcomeController@index'
]);

get('artists', [
	'as'   => 'show_artists',
	'uses' => 'ArtistController@showList'
]);

get('artists/upload', [
	'as'   => 'upload_artists',
	'uses' => 'ArtistController@store'
]);

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
