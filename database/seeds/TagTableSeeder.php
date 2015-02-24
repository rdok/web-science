<?php
use App\StatsApp\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
class TagTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 100) as $index)
		{
			Tag::create([
				'name' => $faker->unique()->word,
			]);
		}
	}
}