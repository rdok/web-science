<?php namespace App\StatsApp\Users\Social;

use App\Http\Requests;
use App\StatsApp\Users\UserRepository;
use Illuminate\Auth\Guard;
use Socialize;

class AuthenticateFacebookUser extends AuthenticateSocialUser
{

	/**
	 * @var UserRepository
	 */
	private $users;
	/**
	 * @var Guard
	 */
	private $guard;

	/**
	 * @param UserRepository $users
	 * @param Guard $guard
	 */
	public function __construct(UserRepository $users, Guard $guard)
	{
		$this->users = $users;
		$this->guard = $guard;
	}

	/**
	 * @param $hasCode
	 * @param AuthenticateUserListener $listener
	 * @return mixed
	 */
	public function execute($hasCode, AuthenticateUserListener $listener)
	{
		if ( ! $hasCode) return $this->getAuthorizationFirst();

		$user = $this->getFacebookUser();

		$user = [
			'username' => $user->email,
			'name'     => $user->name,
			'avatar'   => $user->avatar,
			'email'    => $user->email
		];

		$user = $this->users->findByUserNameOrCreate($user);

		$this->guard->login($user, true);

		return $listener->userHasLoggedIn($user);
	}

	private function getAuthorizationFirst()
	{
		return Socialize::with('facebook')->redirect();
	}

	private function getFacebookUser()
	{
		return $user = Socialize::with('facebook')->user();
	}
}
