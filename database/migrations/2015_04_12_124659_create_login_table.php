<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nameTitlePrefix');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('gender');
            $table->date('dateOfBirth');
            $table->integer('nationalIdentityNo');
            $table->string('country');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->bigInteger('contactNo');
            $table->bigInteger('faxNo');
            $table->string('education');
            $table->bigInteger('paymentModelId');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login');
	}

}
