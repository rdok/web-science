<?php
/**
 * @author Rizart Dokollari
 * @since 2/23/15
 */

$factory('App\StatsApp\Users\User', [
	'name'     => $faker->name,
	'username' => $faker->unique()->username,
	'email'    => $faker->unique()->email,
	'password' => $faker->password
]);