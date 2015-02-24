<?php
/**
 * @author Rizart Dokollari
 * @since 2/19/15
 */

/**
 * @param $routes
 * @param string $active
 * @return string
 */
function set_active($routes, $active = 'active')
{
	foreach ($routes as $route)
	{
		if (Route::is($route)) return $active;
	}

	return;
}

/**
 * Truncate for different db relational systems
 * @param $model
 */
function truncate($model)
{
	$dbConnection = env('DB_CONNECTION');

	$table = with($model)->getTable();

	if (strcmp($dbConnection, 'pgsql') === 0)
	{
		DB::statement("TRUNCATE TABLE $table CASCADE"); // postgresql
	} else if (strcmp($dbConnection, 'mysql') === 0)
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); // mysql
		DB::table($table)->truncate(); // mysql
		DB::statement('SET FOREIGN_KEY_CHECKS=1'); // mysql
	}
}