<?php
/**
 * @author Rizart Dokollari
 * @since 2/19/15
 */

/**
 * @param $route
 * @param string $active
 * @return string
 */
function set_active($route, $active = 'active')
{
	return Route::is($route) ? $active : '';
}