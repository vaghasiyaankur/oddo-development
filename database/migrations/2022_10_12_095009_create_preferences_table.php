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
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->integer('UUID')->unique()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('sort_by')->nullable();
            $table->string('top_filter')->nullable();
            $table->string('style')->nullable();
            $table->string('budget_min')->nullable();
            $table->string('budget_max')->nullable();
            $table->string('property_rating')->nullable();
            $table->string('amenity_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
};
