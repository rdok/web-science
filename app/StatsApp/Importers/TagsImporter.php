<?php namespace App\StatsApp\Importers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class TagsImporter extends Importer
{

	public function import($lastFmUsersFile)
	{
		$rawTags = explode("\n", $lastFmUsersFile); // to array

		$totalTags = count($rawTags) - 1; // -1 due to \n at last line

		$tags = [];

		for ($i = 1; $i < $totalTags; $i++) // first line contains labels; omit them
		{
			list($id, $name) = explode("\t", $rawTags[$i]);

			$now = Carbon::now();

			$tags[] = [
				'id' => $id,
				'name' => htmlspecialchars($name, ENT_SUBSTITUTE, "UTF-8"),
				'created_at' => $now,
				'updated_at' => $now
			];
		}

		$tagChunk = array_chunk($tags, 200);

		foreach ($tagChunk as $chunk)
		{
			DB::table('tags')->insert($chunk);
		}
	}
}