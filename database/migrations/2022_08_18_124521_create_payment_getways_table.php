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
            $table->string('payment_type')->nullable();
            $table->string('client_id')->nullable();
            $table->string('client_secret_key')->nullable();
            $table->string('status')->nullable();
            $table->string('test_mode')->nullable();
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
