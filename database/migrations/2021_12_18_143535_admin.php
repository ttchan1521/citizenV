<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('password');
            $table->integer('boss')->nullable();
            $table->string('position');
        });

        Schema::table('admin', function (Blueprint $table) {
            $table->foreign('boss')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('admin');
    }
}
