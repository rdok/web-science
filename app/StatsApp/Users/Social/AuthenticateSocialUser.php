<?php
/**
 * Created by PhpStorm.
 * User: rdok
 * Date: 12/3/2015
 * Time: 1:24 πμ
 */

namespace App\StatsApp\Users\Social;


abstract class AuthenticateSocialUser
{

	/**
	 * @param $hasCode
	 * @param AuthenticateUserListener $listener
	 * @return mixed
	 */
	public abstract function execute($hasCode, AuthenticateUserListener $listener);
}