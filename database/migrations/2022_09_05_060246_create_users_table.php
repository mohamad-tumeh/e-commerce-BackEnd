<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new  class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->string('device_token')->nullable();
            $table->string('code')->nullable();
            $table->integer('verify')->default(0)->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('e_letter_service')->default(false)->nullable();
            $table->boolean('sms')->default(false)->nullable();
            $table->boolean('is_block')->default(true);
            $table->text('api_token')->nullable();
            $table->text('id_socialite')->nullable();
            $table->integer('language_id')->unsigned()->default(1);
            $table->foreign('language_id')->references('id')->on('languages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
