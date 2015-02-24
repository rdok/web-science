<?php
use App\LastFmUser;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 100) as $index)
		{
			LastFmUser::create([]);
		}
	}
}