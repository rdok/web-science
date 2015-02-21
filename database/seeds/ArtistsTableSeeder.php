<?php
/**
 * @author Rizart Dokollari
 * @version 2/21/15
 */

namespace database\seeds;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArtistsTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 100) as $index)
		{
			Artist::create([
				'slug' => $faker->unique()->userName,
				'name' => $faker->name,
				'url'  => $faker->url
			]);
		}
	}
}