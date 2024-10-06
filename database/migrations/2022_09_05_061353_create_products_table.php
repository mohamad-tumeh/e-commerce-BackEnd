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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('an_name');
            $table->string('image');
            $table->string('sku');
            $table->string('bar_code');
            $table->string('description');
            $table->string('an_description');
            $table->double('price')->default(0);
            $table->integer('is_active')->default(1);
            $table->string('massage')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('section_id')->unsigned();
            $table->integer('product_status_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_status_id')->references('id')->on('product_statuses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
