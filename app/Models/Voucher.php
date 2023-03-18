<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Voucher extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total_amount',
        'status',
        'particulars',
        'student_id',
        'student_registration_no',
        'due_date',
    ];

    /**
     * Get the issue date of voucher.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M, Y');
    }

    /**
     * Get the due date of voucher.
     *
     * @param  string  $value
     * @return string
     */
    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d M, Y');
    }

    /**
     * Get the status of voucher.
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return ucwords($value);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    protected function particulars(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
        );
    }
}
