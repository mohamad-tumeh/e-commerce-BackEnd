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
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('an_name');
            $table->string('post_code');
            $table->string('image');
            $table->string('cover');
            $table->string('phone_number');
            $table->string('bank_account_number');
            $table->integer('city_id')->unsigned();
            $table->integer('tag_id')->unsigned()->nullable();
            $table->integer('store_status_id')->unsigned();
            $table->integer('language_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('store_status_id')->references('id')->on('stores_statuses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('language_id')->references('id')->on('languages')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
