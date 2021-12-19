<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LevelDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('level_detail', function (Blueprint $table) {
            $table->increments('le_de_id');
            $table->unsignedInteger('level');
            $table->foreign('level')->references('level_id')->on('level')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('level_detail');
    }
}
