<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperUploadDownloadsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_upload_downloads', function(Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('paper_id')->unsigned();
            $table->dateTime('upload_datetime');
            $table->dateTime('download_datetime');
            $table->timestamps();
        });

        Schema::table('paper_upload_downloads', function(Blueprint $table)
        {
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
        Schema::drop('paper_upload_downloads');
    }

}
