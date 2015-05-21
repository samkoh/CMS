<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperDiscussionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_discussions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('user_id');
            $table->bigInteger('paper_id')->unsigned();
            $table->text('content');
            $table->binary('status');
            $table->timestamps();
        });

        Schema::table('paper_discussions', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
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
        Schema::drop('paper_discussions');
    }

}
