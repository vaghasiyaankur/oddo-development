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
        Schema::create('amenities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UUID')->unique()->nullable();
            $table->string('amenities');
            $table->string('icon')->nullable();
            $table->boolean('status')->default(0);
            $table->string('slug')->nullable();
            $table->boolean('featured')->default(0);
            $table->integer('amenities_category_id')->unsigned()->nullable();
            $table->foreign('amenities_category_id')->references('id')->on('amenities_categories')->onDelete('cascade');
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
        Schema::dropIfExists('amenities');
    }
};
