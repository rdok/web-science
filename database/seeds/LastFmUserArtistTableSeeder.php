<?php
use App\Artist;
use App\LastFmUser;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserArtistTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$artistsId = Artist::lists('id');

		foreach (range(1, 100) as $index)
		{
			DB::table('last_fm_user_artist')->insert([
				'artist_id'    => $faker->randomElement($artistsId),
				'listen_count' => $faker->buildingNumber(),
				'created_at'   => $faker->dateTimeThisDecade(),
				'updated_at'   => $faker->dateTimeThisDecade()
			]);
		}
	}
}