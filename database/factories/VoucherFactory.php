<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total_amount' => fake()->numberBetween(1000, 100000),
            'status' => fake()->randomElement(['pending', 'paid']),
            'particulars' => json_encode(['asd'=>32423]),
            'student_id' => Student::pluck('id')->random(),
            'due_date' => Carbon::now()->addDays(10),
        ];
    }
}
