<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameSinger');
            $table->text('description')->nullable();
            $table->string('ImageSinger')->nullable()->default('avatarSinger.jpg');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_singer');
    }
}
