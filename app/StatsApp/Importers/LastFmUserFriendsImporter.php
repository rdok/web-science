<?php namespace App\StatsApp\Importers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 3/12/15
 */
class LastFmUserFriendsImporter extends Importer
{

	public function import($userTaggedArtistsFile)
	{
		$rawLastFmUserFriends = explode("\n", $userTaggedArtistsFile); // to array

		$totalUsersFriends = count($rawLastFmUserFriends) - 1; // -1 due to \n at last line

		for ($i = 1; $i < $totalUsersFriends; $i++) // first line contains labels; omit them
		{
			list($lastFmUserId, $friendId) = explode("\t", $rawLastFmUserFriends[$i]);

			$now = Carbon::now();

			$lastFmUserFriends[] = [
				'last_fm_user_id' => $lastFmUserId,
				'friend_id'       => $friendId,
				'created_at'      => $now,
				'updated_at'      => $now
			];
		}

		$lastFmUserFriends = array_chunk($lastFmUserFriends, 300);

		foreach ($lastFmUserFriends as $lastFmUserFriendsChunk)
		{
			DB::table('last_fm_user_friend')->insert($lastFmUserFriendsChunk);
		}
	}
}