<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicYear>
 */
class AcademicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->name();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'is_open_for_admission' => fake()->boolean(),
            'is_active' => fake()->boolean(),
            'is_clossed' => fake()->boolean()
        ];
    }
}
