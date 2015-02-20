<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model {

	protected $fillable = ['year_from', 'year_to'];

	public function bio()
	{
		return $this->belongsTo('App\Bio');
	}

}
