<?php

Event::listen('App\Events\UserWasRegistered', function ($event)
{
//	dd("send mail notification"); use App\Providers\EventServiceProvider
});

//Route::bind('users', function ($username)
//{
//	return \App\User::whereUsername($username)->first();
//});

Event::listen('illuminate.query', function ($sql)
{
//	var_dump($sql);
});

get('/', [
	'as'   => 'show_dashboard',
	'uses' => 'WelcomeController@index'
]);

Route::resource('artists', 'ArtistsController', [
	'only'  => ['index', 'destroy', 'store'],
	'names' => [
		'index'   => 'artists_path',
		'destroy' => 'artists_destroy',
		'store'   => 'artists_store',
	]
]);

/**
 * API
 */
Route::resource('api/v1/artists', 'ApiArtistsController', [
	'only'  => ['index', 'show',],
	'names' => [
		'index' => 'api_artists_path',
		'show'  => 'api_artist_show',
	]
]);


Route::resource('login', 'Auth\SessionController', [
	'only'  => ['index', 'store'],
	'names' => [
		'index' => 'session_index',
		'store' => 'session_store',
	]
]);

get('logout', [
	'as'   => 'session_destroy',
	'uses' => 'Auth\SessionController@destroy'
]);

Route::resource('register', 'Auth\RegistrationController', [
	'only'  => ['index', 'store'],
	'names' => [
		'index' => 'register_index',
		'store' => 'register_store',
	]
]);
