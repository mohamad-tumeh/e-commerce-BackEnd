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
        Schema::create('permissions_primer_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('primer_user_id')->unsigned()->nullable();
            $table->integer('permission_id')->unsigned()->nullable();
            $table->foreign('primer_user_id')->references('id')->on('primer_users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('permission_id')->references('id')->on('permissions')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_primer_users');
    }
};
