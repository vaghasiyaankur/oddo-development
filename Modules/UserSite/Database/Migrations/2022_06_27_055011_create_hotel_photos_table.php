<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UUID')->unique()->nullable();
            $table->string('main_photo')->nullable();
            $table->string('photos')->nullable();
            $table->string('photos_path')->nullable();
            $table->integer('room_id')->unsigned()->nullable();
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('category_id')->references('id')->on('photocategories');
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
        Schema::dropIfExists('hotel_photos');
    }
};
