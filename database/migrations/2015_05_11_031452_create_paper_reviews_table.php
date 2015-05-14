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
            $table->string('reviewer_id');
            $table->string('assigned_by');
            $table->bigInteger('paper_id')->unsigned();
            $table->decimal('score');
            $table->string('paperEvaluation')->nullable();
            $table->string('quality')->nullable();
            $table->string('rationale')->nullable();
            $table->string('hypothesis')->nullable();
            $table->string('manuscript')->nullable();
            $table->string('structure')->nullable();
            $table->text('comment');
            $table->dateTime('reviewed_date');
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
