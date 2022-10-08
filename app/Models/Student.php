<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Student extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'father_name',
        'profile_image',
        'gender',
        'email',
        'phone',
        'father_gaurdian_phone_1',
        'father_gaurdian_phone_2',
        'address',
        'date_of_birth',
        'date_of_joining',
        'national_identity_no',
        'father_national_identity_no',
        'fees_period',
        'fees',
        'fees_status',
        'is_user',
        'user_id',
        'class_id',
        'section_id',
    ];
}
