<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

	protected $fillable = ['name', 'mbid', 'url', 'streamable', 'on_tour'];

	public function bandMembers()
	{
		return $this->hasMany('App\BandMemeber');
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
