<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_user_roles', function(Blueprint $table)
		{
            $table->bigInteger('user_table_id')->unsigned();
            $table->string('user_id');
            $table->bigInteger('user_role_id')->unsigned();
            $table->bigInteger('conference_id')->unsigned();
            $table->timestamps();
		});

        Schema::table('user_user_roles', function(Blueprint $table)
        {
            $table->foreign('user_table_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('cascade');
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
		Schema::drop('user_user_roles');
	}

}
