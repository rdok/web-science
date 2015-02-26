<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLastFmUserFriendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('last_fm_user_friends', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('last_fm_user_id')->unsigned()->index();
			$table->foreign('friend_id')->references('id')->on('last_fm_users')->onDelete('cascade');
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
		Schema::drop('last_fm_user_friend');
	}

}
