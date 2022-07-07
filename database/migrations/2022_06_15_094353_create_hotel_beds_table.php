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
        Schema::create('hotel_beds', function (Blueprint $table) {
            $table->id();
            $table->integer('UUID')->unique()->nullable();
            $table->string('no_of_bed')->nullable();
            $table->integer('bed_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();
            $table->foreign('bed_id')->references('id')->on('bed_types');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('hotel_beds');
    }
};
