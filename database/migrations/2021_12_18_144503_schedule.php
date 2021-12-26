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
            $table->string('nhan_quyen', 10);
            $table->foreign('nhan_quyen')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->string('status');
            $table->integer('sinh')->default(0);
            $table->integer('tu')->default(0);
            $table->integer('young')->nullable();
            $table->ineger('work')->nullable();
            $table->integer('old')->nullable();
        
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
