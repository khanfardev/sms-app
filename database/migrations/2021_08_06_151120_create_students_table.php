<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('class_id')->references('id')->on('student_classes');
            $table->foreign('group_id')->references('id')->on('student_groups');
            $table->foreign('shift_id')->references('id')->on('student_shifts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
