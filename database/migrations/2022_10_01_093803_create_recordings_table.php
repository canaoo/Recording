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
            $table->String('recording_name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->String('memo')->default(null)->nullable();
            $table->integer('hashtag_id')->nullable()->unsigned()->default(null);
            $table->foreign('hashtag_id')->nullable()->references('hashtag_id')->on('hashtags')->onDelete('cascade');
            $table->integer('tag_id')->nullable()->unsigned()->default(null);
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');
            $table->String('recording_file')->nullable();
            $table->String('status')->default('private');
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
