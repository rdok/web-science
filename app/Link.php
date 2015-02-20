<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {

	protected $fillable = ['text', 'rel', 'href'];

	public function bios()
	{
		return $this->morphedByMany('App\Bio', 'urlable');
	}

}
