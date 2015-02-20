<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SimilarArtist extends Model {

	protected $fillable = ['name', 'url'];

	public function images()
	{
		return $this->morphMany('App\Image', 'imageable');
	}

}
