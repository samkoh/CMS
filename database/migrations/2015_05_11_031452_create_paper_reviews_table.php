<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paper_reviews', function(Blueprint $table)
		{
            $table->bigIncrements('id');
            $table->integer('tempId');
            $table->string('reviewer_id');
            $table->string('assigned_by');
            $table->bigInteger('paper_id')->unsigned();
            $table->decimal('score');
            $table->tinyInteger('paperEvaluation')->nullable();
            $table->tinyInteger('confidenceLevel')->nullable();
            $table->tinyInteger('quality')->nullable();
            $table->tinyInteger('rationale')->nullable();
            $table->tinyInteger('hypothesis')->nullable();
            $table->tinyInteger('manuscript')->nullable();
            $table->tinyInteger('structure')->nullable();
            $table->text('comment');
            $table->dateTime('reviewed_date');
            $table->tinyInteger('flag');
            $table->timestamps();
		});

        Schema::table('paper_reviews', function(Blueprint $table)
        {
            $table->foreign('reviewer_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('assigned_by')->references('email')->on('users')->onDelete('cascade');
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
		Schema::drop('paper_reviews');
	}

}
