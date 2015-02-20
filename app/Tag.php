<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name', 'url'];

	public function artists()
	{
		return $this->belongsToMany('App\Artist');
	}
}
