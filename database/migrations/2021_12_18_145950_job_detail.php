<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('job_detail', function (Blueprint $table) {
            $table->increments('job_de_id');
            $table->unsignedInteger('job');
            $table->foreign('job')->references('job_id')->on('job')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('schedule');
            $table->foreign('schedule')->references('sche_id')->on('schedule')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity');
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
        Schema::dropIfExists('job_detail');
    }
}
