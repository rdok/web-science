<?php namespace App\StatsApp\Users;

/**
 * @author Rizart Dokollari
 * @since 2/23/15
 */
class UserRepository
{

	/**
	 * Persists a user
	 *
	 * @param User $user
	 * @return bool
	 */
	public function save(User $user)
	{
		return $user->save();
	}

	public function findByUserNameOrCreate($userData)
	{
		return User::firstOrCreate($userData);
	}
}