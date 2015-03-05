<?php namespace App\StatsApp\Importers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserImporter extends Importer
{

	public function import($tagsFile)
	{
		$rawUserArtist = explode("\n", $tagsFile); // to array

		$totalUserArtist = count($rawUserArtist) - 1; // -1 due to \n at last line

		$userArtist = [];

		for ($i = 1; $i < $totalUserArtist; $i++) // first line contains labels; omit them
		{
			list($userId, $artistId, $weight) = explode("\t", $rawUserArtist[$i]);

			$now = Carbon::now();

			$userArtist[] = [
				'externalUserId'   => $userId,
				'externalArtistId' => $artistId,
				'weight'           => $weight,
				'created_at'       => $now,
				'updated_at'       => $now
			];
		}

		$artistChunk = array_chunk($userArtist, 200);

		foreach ($artistChunk as $chunk)
		{
			DB::table('artists')->insert($chunk);
		}
	}
}