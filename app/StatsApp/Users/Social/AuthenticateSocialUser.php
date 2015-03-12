<?php namespace App\StatsApp\Users\Social;

use App\Http\Requests;
use App\StatsApp\Users\UserRepository;
use Illuminate\Auth\Guard;
use Socialize;

class AuthenticateSocialUser
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
	public function execute($hasCode, AuthenticateUserListener $listener, $driver)
	{
		if ( ! $hasCode) return $this->getAuthorizationFirst($driver);

		$user = $this->getSocialiteUser($driver);

		$user = [
			'username' => $user->nickname,
			'name'     => $user->name,
			'avatar'   => $user->avatar,
			'email'    => $user->email
		];

		$user = $this->users->findByUserNameOrCreate($user);

		$this->guard->login($user, true);

		return $listener->userHasLoggedIn($user);
	}

	private function getAuthorizationFirst($driver)
	{
		return Socialize::with($driver)->redirect();
	}

	private function getSocialiteUser($driver)
	{
		return $user = Socialize::with($driver)->user();
	}
}
