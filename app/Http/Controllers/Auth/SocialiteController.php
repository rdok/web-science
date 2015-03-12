<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\StatsApp\Users\Social\AuthenticateSocialUser;
use App\StatsApp\Users\Social\AuthenticateUserListener;
use Illuminate\Http\Request;

class SocialiteController extends Controller implements AuthenticateUserListener
{

	/**
	 * @param AuthenticateSocialUser $authenticateUser
	 * @param Request $request
	 * @return mixed
	 */
	public function github(AuthenticateSocialUser $authenticateUser, Request $request)
	{
		return $authenticateUser->execute($request->has('code'), $this, 'github');
	}

	/**
	 * @param AuthenticateSocialUser $authenticateUser
	 * @param Request $request
	 * @return mixed
	 */
	public function facebook(AuthenticateSocialUser $authenticateUser, Request $request)
	{
		return $authenticateUser->execute($request->has('code'), $this, 'facebook');
	}

	/**
	 * @param AuthenticateSocialUser $authenticateUser
	 * @param Request $request
	 * @return mixed
	 */
	public function googlePlus(AuthenticateSocialUser $authenticateUser, Request $request)
	{
		return $authenticateUser->execute($request->has('code'), $this, 'google');
	}

	public function userHasLoggedIn($user)
	{
		return redirect()->route('show_dashboard');
	}
}
