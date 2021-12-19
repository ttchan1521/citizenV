<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('gender_detail', function (Blueprint $table) {
            $table->increments('gen_de_id');
            $table->unsignedInteger('gender');
            $table->foreign('gender')->references('gender_id')->on('gender')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('schedule');
            $table->foreign('schedule')->references('sche_id')->on('schedule')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('gender_detail');
    }
}
