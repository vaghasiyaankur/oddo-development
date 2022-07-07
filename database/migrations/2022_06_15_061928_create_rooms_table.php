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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UUID')->unique()->nullable();
            $table->string('custom_name_room')->nullable();
            $table->string('smoking_policy')->nullable();
            $table->integer('number_of_room')->nullable();
            $table->string('guest_stay_room')->nullable();
            $table->string('room_size')->nullable();
            $table->string('room_cal_type')->nullable();
            $table->string('price_room')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('min_person_discount')->nullable();
            $table->string('bathroom_private')->nullable();
            $table->string('bathroom_item')->nullable();
            $table->integer('room_list_id')->unsigned()->nullable();
            $table->integer('room_type_id')->unsigned()->nullable();
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_list_id')->references('id')->on('room_lists');
            $table->foreign('room_type_id')->references('id')->on('room_types');
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
        Schema::dropIfExists('rooms');
    }
};
