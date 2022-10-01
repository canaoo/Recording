<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function (Blueprint $table) {
            $table->increments('recording_id');
            $table->String('name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->refrences('user_id')->on('users')->onDelete('cascade');
            $table->String('memo');
            $table->integer('hashtag_id')->unsigned();
            $table->foreign('hashtag_id')->refrences('hashtag_id')->on('hashtags')->onDelete('cascade');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->refrences('tag_id')->on('tags')->onDelete('cascade');
            $table->String('recording_file');
            $table->String('status');
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
        Schema::dropIfExists('recordings');
    }
};
