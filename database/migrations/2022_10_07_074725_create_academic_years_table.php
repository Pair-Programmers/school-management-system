<?php

use App\Models\AcademicYear;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_open_for_admission')->default(false);
            $table->boolean('is_active')->default(false);
            $table->userstamps();
            $table->softUserstamps();
            $table->timestamps();
            $table->softDeletes();
        });

        $title = 'Batch-' . Carbon::now()->format('Y');
        AcademicYear::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'start_date' => Carbon::now(),
            'end_date' => null,
            'is_open_for_admission' => true,
            'is_active' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_years');
    }
};
