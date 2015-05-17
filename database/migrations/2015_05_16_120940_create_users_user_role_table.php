<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersUserRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_user_role', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('user_id');
            $table->bigInteger('user_role_id')->unsigned();
            $table->bigInteger('conference_id')->unsigned()->nullable();
            $table->timestamps();
		});

        Schema::table('users_user_role', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('user_role_id')->references('id')->on('user_role')->onDelete('cascade');
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
		Schema::drop('users_user_role');
	}

}
