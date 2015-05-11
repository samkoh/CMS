<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paper_evaluations', function(Blueprint $table)
		{
            $table->bigIncrements('id');
            $table->string('reviewer_id');
            $table->bigInteger('paper_id')->unsigned();
            $table->decimal('mark');
            $table->text('comment');
            $table->timestamps();
		});

        Schema::table('paper_evaluations', function(Blueprint $table)
        {
            $table->foreign('reviewer_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paper_evaluations');
	}

}
