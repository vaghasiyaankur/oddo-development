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
        Schema::create('hotel_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->date('date')->nullable();
            $table->float('price')->nullable();
            $table->boolean('open')->default(1);
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
        Schema::dropIfExists('hotel_prices');
    }
};
