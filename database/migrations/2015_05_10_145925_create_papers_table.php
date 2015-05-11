<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('papers', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('conference_id')->unsigned()->nullable();
            $table->string('user_id');
            $table->bigInteger('committeeApprove_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('abstractContent');
            $table->string('status');
            $table->decimal('averageMarks');
            $table->string('fullPaperUrl')->nullable();
            $table->string('cameraReadyUrl')->nullable();
            $table->timestamps();
        });

        Schema::table('papers', function(Blueprint $table)
        {
            $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade');
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('committeeApprove_id')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('papers');
	}

}
