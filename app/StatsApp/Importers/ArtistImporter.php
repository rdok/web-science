<?php namespace App\StatsApp\Importers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */

class ArtistImporter extends Importer {

	public function import($tagsFile)
	{
		$rawArtists = explode("\n", $tagsFile); // to array

		$totalArtists = count($rawArtists) - 1; // -1 due to \n at last line

		$artists = [];

		// TODO: for each line create new artists if new artists slag does not exist
		for ($i = 1; $i < $totalArtists; $i++) // first line contains labels; omit them
		{
			list($id, $name, $url, $pictureUrl) = explode("\t", $rawArtists[$i]);

			$slug = str_replace('http://www.last.fm/music/', '', $url);

			$now = Carbon::now();

			$artists[] = [
				'name'       => $name,
				'slug'       => $slug,
				'url'        => $url,
				'created_at' => $now,
				'updated_at' => $now
			];
		}

		$artistChunk = array_chunk($artists, 200);

		foreach ($artistChunk as $chunk)
		{
			DB::table('artists')->insert($chunk);
		}
	}
}