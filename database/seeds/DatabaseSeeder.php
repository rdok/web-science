<?php

use App\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\ArtistTableSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Artist::truncate();

		Model::unguard();

		$this->call('ArtistTableSeeder');
	}

}
