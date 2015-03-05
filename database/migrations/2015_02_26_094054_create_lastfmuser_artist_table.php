<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLastfmuserArtistTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('last_fm_user_artist', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('last_fm_users_id')->unsigned()->index();
			$table->foreign('last_fm_users_id')->references('id')->on('last_fm_users')->onDelete('cascade');
			$table->integer('artist_id')->unsigned()->index();
			$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
			$table->mediumInteger('listen_count');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('last_fm_user_artist');
	}

}
