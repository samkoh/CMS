<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('address', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('addressLine1');
            $table->string('addressLine2');
            $table->string('addressLine3');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('country_id')->unsigned();
            $table->integer('postalCode');
            $table->timestamps();
        });

        Schema::table('address', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('address_country')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('address');
	}

}
