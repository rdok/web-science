<?php
//Event::listen('App\Events\UserWasRegistered', function ($event){	dd("send mail notification"); use App\Providers\EventServiceProvider});
//Event::listen('illuminate.query', function ($sql){	var_dump($sql);});

Route::bind('artists', function ($slug)
{
	return \App\Artist::where('slug', $slug)->first();
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


Route::resource('lastfm-users/artists', 'LastFmUsersArtistsController', [
	'only'  => ['index', 'destroy', 'store'],
	'names' => [
		'index'   => 'last_fm_users_artists_path',
		'destroy' => 'last_fm_users_artists_destroy',
		'store'   => 'last_fm_users_artists_store',
	]
]);

Route::resource('lastfm-users', 'LastFmUsersController', [
	'only'  => ['index', 'destroy', 'store'],
	'names' => [
		'index'   => 'last_fm_users_path',
		'destroy' => 'last_fm_users_destroy',
	]
]);

Route::resource('tags', 'TagsController', [
	'only'  => ['index', 'destroy', 'store'],
	'names' => [
		'index'   => 'tags_path',
		'destroy' => 'tags_destroy',
		'store'   => 'tags_store',
	]
]);

/**
 * API
 */
get('api/v1/artists/{artists}/tags', [
	'as'   => 'api_artist_tags',
	'uses' => 'Api\TagsController@index'
]);
get('api/v1/tags', [
	'as'   => 'api_tags_path',
	'uses' => 'Api\TagsController@index'
]);

Route::resource('api/v1/artists', 'Api\ArtistsController', [
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
