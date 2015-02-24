<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LastFmUser extends Model {

	public function friends()
	{
		return $this->belongsToMany('LastFmUser', 'last_fm_user_friends', 'last_fm_user_id', 'friend_id');
	}

}
