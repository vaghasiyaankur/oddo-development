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
            $table->string('smoking_policy');
            $table->string('custom_name_room')->nullable();
            $table->integer('number_of_room');
            $table->integer('number_of_bed');
            $table->string('guest_stay_room');
            $table->string('room_size');
            $table->string('room_cal_type');
            $table->string('price_room');
            $table->integer('room_list_id')->nullable();
            $table->integer('bed_type_id')->nullable();
            $table->integer('room_type_id')->nullable();
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
