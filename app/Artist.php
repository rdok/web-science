<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

	protected $fillable = ['slug', 'name', 'mbid', 'url', 'streamable', 'on_tour'];

	public function bandMembers()
	{
		return $this->hasMany('App\BandMember');
	}

	public function tags()
	{
		return $this->belongsToMany('App\StatsApp\Tag', 'last_fm_user_tag_artist');
	}

	public function images()
	{
		return $this->morphMany('App\Image', 'imageable');
	}

	public function stat()
	{
		return $this->hasOne('App\Stat');
	}

	public function lastFmUsers()
	{
		return $this->belongsToMany('App\LastFmUser', 'last_fm_user_artist', 'last_fm_users_id', 'artist_id')->withPivot('listen_count');
	}
}
