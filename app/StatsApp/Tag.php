<?php namespace App\StatsApp;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name'];

	public function artists()
	{
		return $this->belongsToMany('App\StatsApp\Artist');
	}
}
