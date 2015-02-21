<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model {

	protected $fillable = ['listeners', 'play_count'];

	public function artist()
	{
		return $this->belongsTo('App\Artist')->withTimestamps();
	}
}
