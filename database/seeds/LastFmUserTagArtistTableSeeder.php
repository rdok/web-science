<?php
use App\Artist;
use App\LastFmUser;
use App\StatsApp\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserTagArtistTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$lastFmUsersId = LastFmUser::lists('id');
		$artistsId = Artist::lists('id');
		$tagsId = Tag::lists('id');

		foreach (range(1, 100) as $index)
		{
			DB::table('last_fm_user_tag_artist')->insert([
				'artist_id'       => $faker->randomElement($artistsId),
				'tag_id'          => $faker->randomElement($tagsId),
				'last_fm_user_id' => $faker->randomElement($lastFmUsersId),
				'updated_at'      => $faker->dateTimeThisDecade(),
				'created_at'      => $faker->dateTimeThisDecade()
			]);
		}
	}
}