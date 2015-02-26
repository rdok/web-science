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
	 * @return void
	 */
	public function run()
	{
		$this->cleanDatabase();

		Model::unguard();

		$this->call('ArtistsTableSeeder');
		$this->call('LastFmUsersTableSeeder');
		$this->call('TagsTableSeeder');

		$this->call('LastFmUserArtistTableSeeder');
		$this->call('LastFmUserFriendTableSeeder');
		$this->call('LastFmUserTagArtistTableSeeder');
	}

	public function cleanDatabase()
	{
		foreach ($this->tables as $tableName)
		{
			truncateByTable($tableName);
		}
	}

}
