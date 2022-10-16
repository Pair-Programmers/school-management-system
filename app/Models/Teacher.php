<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Teacher extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'profile_image',
        'gender',
        'email',
        'phone_1',
        'phone_2',
        'address',
        'designation',
        'date_of_birth',
        'major_subject',
        'description',
        'qualification',
        'is_married',
        'date_of_joining',
        'national_identity_no',
        'facebook',
        'instagram',
        'twitter',
        'salary',
        'is_user',
        'user_id',
    ];
}
