<?php namespace App\StatsApp\Transformers;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class ArtistTransformer extends Transformer {

	/**
	 * @param $artist
	 * @return array
	 */
	public function transform($artist)
	{
		return [
			'slug'       => $artist['slug'],
			'name'       => $artist['name'],
			'lastfm_url' => $artist['url'],
			'updated_at' => $artist['updated_at']
			// 'active' => (boolean) $lesson['some_bool']
		];
	}
}