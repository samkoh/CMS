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
            $table->integer('loginId')->length(10)->unsigned();
            $table->bigInteger('feesId')->nullable();
            $table->string('name');
            $table->string('acronym');
            $table->string('theme');
            $table->text('venueAddress');
            $table->string('websiteURL');
            $table->string('email');
            $table->bigInteger('contactNo');
            $table->bigInteger('faxNo');
            $table->timestamp('startDate');
            $table->timestamp('endDate');
            $table->timestamps();
        });

        Schema::table('conferences', function(Blueprint $table)
        {
            $table->foreign('loginId')->references('id')->on('login')->onDelete('cascade');
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
