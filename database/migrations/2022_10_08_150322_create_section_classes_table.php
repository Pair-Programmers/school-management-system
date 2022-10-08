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
        Schema::create('section_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreignId('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
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
        Schema::dropIfExists('section_classes');
    }
};
