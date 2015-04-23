<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceTopicTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_topic', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('conference_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('conference_topic', function(Blueprint $table)
        {
            $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conference_topic');
    }

}
