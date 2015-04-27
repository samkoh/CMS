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
            $table->bigInteger('conference_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('committeeApprove_id')->unsigned();
            $table->string('title');
            $table->text('abstractContent');
            $table->string('status');
            $table->string('fullPaperUrl')->nullable();
            $table->string('cameraReadyUrl')->nullable();
            $table->timestamps();
        });

        Schema::table('papers', function(Blueprint $table)
        {
            $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
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
