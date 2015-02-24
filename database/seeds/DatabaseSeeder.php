<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 * For truncate/mysql use:
	 *  DB::statement('SET FOREIGN_KEY_CHECKS=0');
	 *  Artist::truncate();
	 *  Tag::truncate();
	 *  DB::table('artist_tag')->truncate();
	 *  DB::statement('SET FOREIGN_KEY_CHECKS=1');
	 * @return void
	 */
	public function run()
	{
		//	PostgreSQL
		DB::statement('TRUNCATE TABLE artists CASCADE');
		DB::statement('TRUNCATE TABLE tags CASCADE');
		DB::statement('TRUNCATE TABLE last_fm_users CASCADE');
		DB::statement('TRUNCATE TABLE artist_tag');

		Model::unguard();

		$this->call('LastFmUsersTableSeeder');
		$this->call('ArtistsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('ArtistTagTableSeeder');
	}

}
