<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model {

	protected $fillable = ['published', 'summary', 'content', 'year_formed'];

	public function formations()
	{
		return $this->hasMany('App\Formation');
	}

	public function links()
	{
		return $this->morphMany('App\Link', 'linkable');
	}
}
