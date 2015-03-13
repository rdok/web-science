<?php namespace App\StatsApp\Importers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserTaggedArtistsImporter extends Importer
{

	public function import($userTaggedArtistsFile)
	{
		$rawUserTaggedArtist = explode("\n", $userTaggedArtistsFile); // to array

		$totalUserTaggedArtist = count($rawUserTaggedArtist) - 1; // -1 due to \n at last line

		for ($i = 1; $i < $totalUserTaggedArtist; $i++) // first line contains labels; omit them
		{
			list($userId, $artistId, $tagId, $timestamp) = explode("\t", $rawUserTaggedArtist[$i]);

			$now = Carbon::now();

			$userTaggedArtists[] = [
				'artist_id'       => $artistId,
				'tag_id'          => $tagId,
				'last_fm_user_id' => $userId,
				'created_at'      => Carbon::createFromTimeStamp($timestamp, config('app.timezone'))->toDateTimeString(),
				'updated_at'      => $now
			];
		}

		$userTaggedArtists = array_chunk($userTaggedArtists, 200);

		foreach ($userTaggedArtists as $userTaggedArtistsChunk)
		{
			DB::table('last_fm_user_tag_artist')->insert($userTaggedArtistsChunk);
		}
	}
}