<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLastfmuserFriendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('last_fm_user_friend', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('last_fm_user_id')->unsigned()->index();
			$table->foreign('last_fm_user_id')->references('id')->on('last_fm_users')->onDelete('cascade');
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
