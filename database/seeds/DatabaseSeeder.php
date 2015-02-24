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
		// postgress
		DB::statement('TRUNCATE TABLE users CASCADE');
		DB::statement('TRUNCATE TABLE password_resets CASCADE');
		DB::statement('TRUNCATE TABLE similar_artists CASCADE');
		DB::statement('TRUNCATE TABLE last_fm_users CASCADE');
		DB::statement('TRUNCATE TABLE artists CASCADE');
		DB::statement('TRUNCATE TABLE tags CASCADE');
		DB::statement('TRUNCATE TABLE last_fm_user_friend');
		DB::statement('TRUNCATE TABLE last_fm_user_tag_artist');

		Model::unguard();

		$this->call('ArtistTableSeeder');
		$this->call('LastFmUsersTableSeeder');
		$this->call('LastFmUserFriendTableSeeder');
		$this->call('TagTableSeeder');
		$this->call('LastFmUserTagArtistTableSeeder');
	}

}
