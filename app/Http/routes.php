<?php

Event::listen('illuminate.query', function($sql){
//	var_dump($sql);
});

get('/', [
	'as'   => 'show_dashboard',
	'uses' => 'WelcomeController@index'
]);

$router->resource('artists', 'ArtistsController', [
	'only' => ['index', 'store'],
	'names' => [
		'index' => 'artists_path',
		'store' => 'artists_store'
	]
]);

post('queue/db/insert/artists', function(){

});

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
