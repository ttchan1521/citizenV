<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Schedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('sche_id');
            $table->integer('cap_quyen');
            $table->foreign('cap_quyen')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('nhan_quyen');
            $table->foreign('nhan_quyen')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('start');
            $table->timestamp('end')->useCurrent();
            $table->string('status');
        
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
        Schema::dropIfExists('schedule');
    }
}
