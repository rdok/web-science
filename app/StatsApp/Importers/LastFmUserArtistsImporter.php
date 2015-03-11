<?php namespace App\StatsApp\Importers;

use App\Artist;
use App\LastFmUser;
use Carbon\Carbon;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserArtistsImporter extends Importer
{

	public function import($lastFmUserArtistsFile)
	{
		$rawUserArtist = explode("\n", $lastFmUserArtistsFile); // to array

		$totalUserArtist = count($rawUserArtist) - 1; // -1 due to \n at last line

		$usersArtists = [];

		for ($i = 1; $i < $totalUserArtist; $i++) // first line contains labels; omit them
		{
			list($lastFmUserId, $artistId, $weight) = explode("\t", $rawUserArtist[$i]);

			$now = Carbon::now();

			$lastFmUserArtists[] = [
				'last_fm_users_id' => $lastFmUserId,
				'artist_id'        => $artistId,
				'listen_count'     => $weight,
				'created_at'       => $now,
				'updated_at'       => $now
			];
		}

		// store to an array all the users
		$lastFmUsers = array_unique(array_map(function ($i)
		{
			return $i['last_fm_users_id'];
		}, $lastFmUserArtists));

		dd($lastFmUsers);

		// for each users store all artists
		// for each user store pivot to databae

		$lastFmUserArtists = array_chunk($usersArtists, 200);

		foreach ($lastFmUserArtists as $lastFmUserArtistsChunk)
		{
//			DB::table('last_fm_user_artist')->insert($lastFmuserArtistsChunk);
			$artist = new Artist();
			$lastFmUser = LastFmUser::find($lastFmUserArtistsChunk['last_fm_users_id']);
		}
	}
}