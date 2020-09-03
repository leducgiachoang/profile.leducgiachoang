<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameSong');
            $table->string('ImageSong')->nullable()->default('imageSong.jpg');
            $table->text('Lyrics')->nullable();
            $table->integer('idCategorySong')->unsigned();
            $table->foreign('idCategorySong')->references('id')->on('category_song')->onDelete('cascade');
            $table->integer('idSinger')->unsigned();
            $table->foreign('idSinger')->references('id')->on('singer')->onDelete('cascade');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_song');
    }
}
