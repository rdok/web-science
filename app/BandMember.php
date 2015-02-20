<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BandMember extends Model {

	protected $fillable = ['name', 'year_from', 'year_to'];

	public function artist()
	{
		return $this->belongsTo('App\Artist');
	}
}
