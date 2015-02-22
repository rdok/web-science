<?php

Event::listen('illuminate.query', function ($sql)
{
//	var_dump($sql);
});

get('/', [
	'as'   => 'show_dashboard',
	'uses' => 'WelcomeController@index'
]);

Route::resource('artists', 'ArtistsController', [
	'only'  => ['index', 'store', 'show', 'destroy'],
	'names' => [
		'index'   => 'artists_path',
		'store'   => 'artists_store',
		'show'    => 'artist_show',
		'destroy' => 'artists_destroy'
	]
]);

Route::resource('api/v1/artists', 'ApiArtistsController', [
	'only'  => ['index', 'store', 'show', 'destroy'],
	'names' => [
		'index'   => 'api_artists_path',
		'store'   => 'api_artists_store',
		'show'    => 'api_artist_show',
		'destroy' => 'api_artists_destroy'
	]
]);

get('login', [
	'as' => 'login_index', 'uses' => 'Auth\LoginController@index'
]);

Route::resource('register', 'Auth\RegistrationController', [
	'only'  => ['index', 'store'],
	'names' => [
		'index' => 'register_index',
		'store' => 'register_store',
	]
]);
