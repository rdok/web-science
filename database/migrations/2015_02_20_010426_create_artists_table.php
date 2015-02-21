<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artists', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('name');
			$table->string('mbid')->unique()->nullable();
			$table->string('url');
			$table->string('streamable')->nullable();
			$table->string('on_tour')->nullable();
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
		Schema::drop('artists');
	}

}
