<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Clas extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function noOfStudents()
    {
        return count($this->hasMany(Student::class, 'class_id')->get());
    }

    public function sectionNames()
    {
        return $this->hasMany(Section::class, 'class_id')->get(['name'])->pluck('name')->toArray();
    }

}
