<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Section extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'class_id',
        'teacher_id',
        'room_no',
        'student_limit',
    ];

    public function class()
    {
        return $this->belongsTo(Clas::class);
    }

    public function coordinator()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function noOfStudents()
    {
        return count($this->hasMany(Student::class, 'section_id')->get());
    }
}
