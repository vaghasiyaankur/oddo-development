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
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('UUID')->unique()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();
            $table->string('rent')->nullable();
            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->boolean('status')->default(1);
            $table->text('attachment')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('day_diff')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('payment_method_id')->references('id')->on('payment_getways');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_bookings');
    }
};
