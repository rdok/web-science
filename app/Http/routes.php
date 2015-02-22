<?php

Event::listen('illuminate.query', function ($sql)
{
//	var_dump($sql);
});

get('/', [
	'as'   => 'show_dashboard',
	'uses' => 'WelcomeController@index'
]);

Route::group(['prefix' => 'api/v1'], function ()
{
	Route::resource('artists', 'ArtistsController', [
		'only'  => ['index', 'store', 'show'],
		'names' => [
			'index' => 'artists_path',
			'store' => 'artists_store',
			'show'  => 'artist_show'
		]
	]);
});

//post('queue/db/insert/artists', function ()
//{
//
//});