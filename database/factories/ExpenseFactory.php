<?php

namespace Database\Factories;

use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'expense_date' => $this->faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            'amount' => $this->faker->numberBetween($min = 10, $max = 2000000),
            'note' => $this->faker->paragraph(),
            'expense_category_id' => ExpenseCategory::pluck('id')->random(),
            'created_by' => 1,
        ];
    }
}
