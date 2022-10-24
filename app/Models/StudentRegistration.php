<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class StudentRegistration extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_registration_no',
        'academic_year_id',
        'student_id',
        'class_id',
        'section_id',
        'is_promoted',
        'old_student_registration_id',
        'board_registration_no',
        'board_exam_marks',
        'date_of_registration',
        'date_of_completion',
        'fees',
    ];
}
