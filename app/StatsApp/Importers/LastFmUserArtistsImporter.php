<?php namespace App\StatsApp\Importers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserArtistsImporter extends Importer
{

	public function import($lastFmUserFriendsFile)
	{
		$rawLastFmUserArtist = explode("\n", $lastFmUserFriendsFile); // to array

		$totalUserArtist = count($rawLastFmUserArtist) - 1; // -1 due to \n at last line

		for ($i = 1; $i < $totalUserArtist; $i++) // first line contains labels; omit them
		{
			list($lastFmUserId, $artistId, $weight) = explode("\t", $rawLastFmUserArtist[$i]);

			$now = Carbon::now();

			$lastFmUserArtists[] = [
				'last_fm_users_id' => $lastFmUserId,
				'artist_id'        => $artistId,
				'listen_count'     => $weight,
				'created_at'       => $now,
				'updated_at'       => $now
			];
		}

		$lastFmUserArtists = array_chunk($lastFmUserArtists, 200);

		foreach ($lastFmUserArtists as $lastFmUserArtistsChunk)
		{
			DB::table('last_fm_user_artist')->insert($lastFmUserArtistsChunk);
		}
	}
}