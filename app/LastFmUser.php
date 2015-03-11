<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LastFmUser extends Model
{

	public function friends()
	{
		return $this->belongsToMany('App\LastFmUser', 'last_fm_user_friend', 'last_fm_user_id', 'friend_id');
	}

	public function artists()
	{
		return $this->belongsToMany('App\Artist', 'last_fm_user_artist', 'last_fm_users_id', 'artist_id')->withPivot('listen_count');
	}

}
