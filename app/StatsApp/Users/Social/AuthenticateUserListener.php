<?php
/**
 * Created by PhpStorm.
 * User: rdok
 * Date: 12/3/2015
 * Time: 1:21 πμ
 */
namespace App\StatsApp\Users\Social;

interface AuthenticateUserListener
{
	public function userHasLoggedIn($user);
}