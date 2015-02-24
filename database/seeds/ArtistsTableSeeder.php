<?php
use App\Artist;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class ArtistsTableSeeder extends Seeder {

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