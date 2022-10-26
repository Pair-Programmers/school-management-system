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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->unique();
            $table->foreignId('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_years');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreignId('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreignId('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->date('date_of_registration')->nullable();
            $table->date('date_of_completion')->nullable();
            $table->boolean('is_promoted')->default(false);
            $table->foreignId('old_student_registration_id')->nullable();
            $table->string('board_registration_no')->nullable();
            $table->integer('board_exam_marks')->nullable();
            $table->integer('fees')->nullable();
            $table->userstamps();
            $table->softUserstamps();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_registrations');
    }
};
