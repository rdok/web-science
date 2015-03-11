<?php
use App\LastFmUser;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class LastFmUserFriendTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		$usersId = LastFmUser::lists('id');

		foreach (range(1, 100) as $index)
		{
			DB::table('last_fm_user_friend')->insert([
				'last_fm_user_id' => $faker->randomElement($usersId),
				'friend_id'       => $faker->randomElement($usersId),
				'created_at'      => $faker->dateTimeThisDecade(),
				'updated_at'      => $faker->dateTimeThisDecade()
			]);
		}
	}
}