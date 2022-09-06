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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('UUID')->unique()->nullable();
            $table->integer('staff')->nullable();
            $table->integer('cleaness')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('location')->nullable();
            $table->integer('breakfast')->nullable();
            $table->integer('service_staff')->nullable();
            $table->integer('property')->nullable();
            $table->integer('price_quality')->nullable();
            $table->integer('amenities')->nullable();
            $table->integer('internet')->nullable();
            $table->integer('total_rating')->nullable();
            $table->string('feedback')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
