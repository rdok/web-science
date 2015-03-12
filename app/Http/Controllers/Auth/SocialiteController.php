<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\StatsApp\Users\Social\AuthenticateFacebookUser;
use App\StatsApp\Users\Social\AuthenticateGitHubUser;
use App\StatsApp\Users\Social\AuthenticateUserListener;
use Illuminate\Http\Request;

class SocialiteController extends Controller implements AuthenticateUserListener
{

	/**
	 * @param AuthenticateGitHubUser $authenticateUser
	 * @param Request $request
	 * @return mixed
	 */
	public function github(AuthenticateGitHubUser $authenticateUser, Request $request)
	{
		return $authenticateUser->execute($request->has('code'), $this);
	}

	/**
	 * @param AuthenticateFacebookUser $authenticateUser
	 * @param Request $request
	 * @return mixed
	 */
	public function facebook(AuthenticateFacebookUser $authenticateUser, Request $request)
	{
		return $authenticateUser->execute($request->has('code'), $this);
	}

	public function userHasLoggedIn($user)
	{
		return redirect()->route('show_dashboard');
	}
}
