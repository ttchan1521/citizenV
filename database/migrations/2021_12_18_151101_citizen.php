<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Citizen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('citizen', function (Blueprint $table) {
            $table->increments('citizen_id');
            $table->string('fullname');
            $table->date('birthdate');
            $table->unsignedInteger('gender');
            $table->foreign('gender')->references('gender_id')->on('gender')->onUpdate('cascade')->onDelete('cascade');
            $table->string('hometown');
            $table->string('address');
            $table->string('hamlet', 10);
            $table->foreign('hamlet')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->string('temporary_add');
            $table->string('identity_num')->nullable();
            $table->string('ton_giao')->nullable();
            $table->unsignedInteger('education_level');
            $table->foreign('education_level')->references('level_id')->on('level')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('job');
            $table->foreign('job')->references('job_id')->on('job')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('update')->useCurrent();
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
        Schema::dropIfExists('citizen');
    }
}
