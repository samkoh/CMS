<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipientMessageLogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipient_message_logs', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('recipient_id');
            $table->bigInteger('messagelog_id')->unsigned()->nullable();
            $table->text('content');
            $table->timestamps();
        });

        Schema::table('recipient_message_logs', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('messagelog_id')->references('id')->on('message_logs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipient_message_logs');
    }

}
