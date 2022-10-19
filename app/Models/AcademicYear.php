<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
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
    ];

    public function getStartDate(){
        return Carbon::parse($this->attributes['start_date'])->format('d M, Y');
    }

    public function getEndDate(){
        return Carbon::parse($this->attributes['end_date'])->format('d M, Y');
    }
}
