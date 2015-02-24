<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	private $tables = [
		'users', 'password_resets',
		'artists', 'similar_artists',
		'last_fm_users', 'last_fm_user_friend',
		'tags',
		'last_fm_user_tag_artist',
	];

	/**
	 * Run the database seeds.
	 * For truncate/mysql use:
	 * @return void
	 */
	public function run()
	{
		// postgress
		$this->cleanDatabase();

		Model::unguard();

		$this->call('ArtistTableSeeder');
		$this->call('LastFmUsersTableSeeder');
		$this->call('LastFmUserFriendTableSeeder');
		$this->call('TagTableSeeder');
		$this->call('LastFmUserTagArtistTableSeeder');
	}

	public function cleanDatabase()
	{
		// DB::statement('SET FOREIGN_KEY_CHECKS=0'); // mysql
		foreach ($this->tables as $tableName)
		{
			DB::statement("TRUNCATE TABLE $tableName CASCADE"); // postgresql
			// DB::table($tableName)->truncate(); // mysql
		}
		// DB::statement('SET FOREIGN_KEY_CHECKS=1'); // mysql
	}

}
