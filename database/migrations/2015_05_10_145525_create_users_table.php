<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('user_role');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('nameTitlePrefix');
            $table->string('gender');
            $table->date('dateOfBirth');
            $table->integer('nationalIdentityNo');
            $table->string('addressLine1');
            $table->string('addressLine2');
            $table->string('addressLine3');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('postalCode');
            $table->string('country');
            $table->bigInteger('contactNo');
            $table->bigInteger('faxNo');
            $table->string('education');
            $table->bigInteger('paymentModelId');
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
