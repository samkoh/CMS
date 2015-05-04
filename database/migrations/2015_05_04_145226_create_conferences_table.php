<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferencesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('conferenceName');
            $table->string('acronym');
            $table->string('theme');
            $table->string('address');
            $table->string('websiteUrl');
            $table->string('email');
            $table->integer('contactNo');
            $table->integer('faxNo');
            $table->date('startDate');
            $table->date('endDate');
            $table->timestamps();
        });

        Schema::table('conferences', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conferences');
    }

}
