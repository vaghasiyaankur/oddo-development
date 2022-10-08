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
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UUID')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('location')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('show_title')->default(1);
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
