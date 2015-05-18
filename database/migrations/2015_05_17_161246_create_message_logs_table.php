<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_logs', function(Blueprint $table)
		{
			$table->bigIncrements('id');
            $table->bigInteger('conference_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('content');
			$table->timestamps();
		});

        Schema::table('message_logs', function(Blueprint $table)
        {
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
		Schema::drop('message_logs');
	}

}
