<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_conferences', function(Blueprint $table)
		{
			$table->bigIncrements('id');
            $table->string('user_id');
            $table->bigInteger('conference_id')->unsigned();
			$table->timestamps();
		});

        Schema::table('user_conferences', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_conferences');
	}

}
