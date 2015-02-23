<?php namespace App\Events;

/**
 * @author Rizart Dokollari
 * @since 2/23/15
 */

use App\StatsApp\Users\User;
use Illuminate\Queue\SerializesModels;

class UserWasRegistered {

	public $user;
	use SerializesModels;

	/**
	 * Create a new event instance.
	 * @param User $user
	 */
	function __construct(User $user)
	{
		$this->user = $user;
	}


}