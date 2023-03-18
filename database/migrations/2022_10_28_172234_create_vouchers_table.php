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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('total_amount');
            $table->string('status')->default('unpaid');
            $table->json('particulars');
            $table->date('due_date');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->string('student_registration_no')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
};
