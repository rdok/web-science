<?php namespace App\Commands;

use App\StatsApp\Users\User;
use App\StatsApp\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class RegisterUser
 * @package App\Commands
 */
class RegisterUser extends Command implements SelfHandling {

	protected $userRepository;
	protected $username;
	protected $name;
	protected $email;
	protected $password;

	/**
	 * Create a new command instance.
	 *
	 * @param $username
	 * @param $name
	 * @param $email
	 * @param $password
	 */
	public function __construct($username, $name, $email, $password)
	{
		$this->username = $username;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;

		$this->userRepository = new UserRepository;
	}

	/**
	 * Execute the command.
	 *
	 * @return static
	 */
	public function handle()
	{
		$user = User::register(
			$this->username, $this->name, $this->email, $this->password
		);

		$this->userRepository->save($user);

//		event(new UserWasRegistered($user));

		return $user;
	}

}
