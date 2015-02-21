<?php

Event::listen('illuminate.query', function ($sql)
{
//	var_dump($sql);
});

get('/', [
	'as'   => 'show_dashboard',
	'uses' => 'WelcomeController@index'
]);

$router->resource('artists', 'ArtistsController', [
	'only'  => ['index', 'store', 'destroy'],
	'names' => [
		'index'   => 'artists_path',
		'store'   => 'artists_store',
		'destroy' => 'artists_destroy'
	]
]);

// TODO: queue service if process takes to lon
post('queue/db/insert/artists', function ()
{

});

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
