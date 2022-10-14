<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class AcademicYear extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'start_date',
        'end_date',
        'is_open_for_admission',
        'is_active',
        'is_clossed',
    ];
}
