<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Expense extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $fillable = [
        'expense_date',
        'amount',
        'note',
        'files',
        'expense_category_id',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne(ExpenseCategory::class, 'id', 'expense_category_id');
    }

    protected function expenseDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d M, Y'),
        );
    }
}
