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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->unique()->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('gender');
            $table->string('blood_group', 3)->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('father_gaurdian_phone_1')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('father_gaurdian_phone_2')->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('national_identity_no')->nullable();
            $table->string('father_national_identity_no')->nullable();
            $table->string('fees_period')->nullable();
            $table->integer('fees')->nullable();
            $table->integer('arears')->default(0);
            $table->string('fees_status')->nullable();
            $table->boolean('is_user')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreignId('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
            $table->foreignId('academic_year_id')->nullable();
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onDelete('set null');
            $table->userstamps();
            $table->softUserstamps();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
};
