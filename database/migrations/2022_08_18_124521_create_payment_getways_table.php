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
        Schema::create('payment_getways', function (Blueprint $table) {
            $table->id();
            $table->integer('UUID')->unique()->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_icon')->nullable();
            $table->string('test_client_id')->nullable();
            $table->string('test_client_secret_key')->nullable();
            $table->string('test_api_secret_key')->nullable();
            $table->string('live_client_id')->nullable();
            $table->string('live_client_secret_key')->nullable();
            $table->string('live_api_secret_key')->nullable();
            $table->string('status')->nullable();
            $table->string('mode')->nullable();
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
        Schema::dropIfExists('payment_getways');
    }
};
