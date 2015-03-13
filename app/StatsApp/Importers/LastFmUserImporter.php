<?php namespace App\StatsApp\Importers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserImporter extends Importer
{

	public function import($userTaggedArtistsFile)
	{
		$rawLastFmUserArtist = explode("\n", $userTaggedArtistsFile); // to array

		$totalUserArtist = count($rawLastFmUserArtist) - 1; // -1 due to \n at last line

		// TODO: verify user_id is first column

		for ($i = 1; $i < $totalUserArtist; $i++) // first line contains labels; omit them
		{
			// all .dat files with users_id has as first column user id
			list($lastFmUserId) = explode("\t", $rawLastFmUserArtist[$i]);

			$now = Carbon::now();

			$lastFmUserArtists[$lastFmUserId] = [
				'id'         => $lastFmUserId,
				'created_at' => $now,
				'updated_at' => $now
			];
		}

		$lastFmUserArtists = array_chunk($lastFmUserArtists, 200);

		foreach ($lastFmUserArtists as $lastFmUserArtistsChunk)
		{
			DB::table('last_fm_users')->insert($lastFmUserArtistsChunk);
		}
	}
}