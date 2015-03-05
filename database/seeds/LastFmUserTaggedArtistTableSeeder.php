<?php
use App\Artist;
use App\LastFmUser;
use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserTaggedArtistTagTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$artistsId = Artist::lists('id');
		$tagIds = Tag::lists('id');
		$user_last_fm_Ids = LastFmUser::lists('id');


		foreach (range(1, 100) as $index)
		{
			// a real lesson id
			// a real tag id
			DB::table('artist_tag')->insert([
				'artist_id'       => $faker->randomElement($artistsId),
				'tag_id'          => $faker->randomElement($tagIds),
				'last_fm_user_id' => $faker->randomElement($user_last_fm_Ids)
			]);
		}
	}
}