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
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property_name')->nullable();
            $table->string('star_rating')->nullable();
            $table->string('street_addess')->nullable();
            $table->string('address_line')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('pos_code')->nullable();
            $table->string('parking_available')->nullable();
            $table->string('reservation')->nullable();
            $table->string('parking_site')->nullable();
            $table->string('parking_type')->nullable();
            $table->string('price_parking')->nullable();
            $table->string('breakfast')->nullable();
            $table->string('breakfast_price')->nullable();
            $table->string('breakfast_type')->nullable();
            $table->string('language')->nullable();
            $table->string('facilities')->nullable();
            $table->string('extra_bed')->nullable();
            $table->string('number_extra_bed')->nullable();
            $table->string('guest_extra_bed')->nullable();
            $table->string('photo_gallry')->nullable();
            $table->string('policy')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('pet')->nullable();
            $table->string('pet_charge')->nullable();
            $table->string('amenity_id')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('room_list_id')->unsigned()->nullable();
            $table->integer('amenities_id')->unsigned()->nullable();
            $table->integer('food_type_id')->unsigned()->nullable();
            $table->integer('bed_type_id')->unsigned()->nullable();
            $table->integer('hotel_contact_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();

            $table->foreign('room_list_id')->references('id')->on('room_lists')->onDelete('cascade');
            $table->foreign('amenities_id')->references('id')->on('amenities')->onDelete('cascade');
            $table->foreign('food_type_id')->references('id')->on('food_types')->onDelete('cascade');
            $table->foreign('bed_type_id')->references('id')->on('bed_types')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('hotels');
    }
};
