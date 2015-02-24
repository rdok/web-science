<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

	protected $fillable = ['slug', 'name', 'mbid', 'url', 'streamable', 'on_tour'];

	public function bandMembers()
	{
		return $this->hasMany('App\BandMember');
	}

	public function tags()
	{
		return $this->hasMany('App\Tag');
	}

	public function images()
	{
		return $this->morphMany('App\Image', 'imageable');
	}

	public function stat()
	{
		return $this->hasOne('App\Stat');
	}
}
