<?php

namespace Database\Factories;

use App\Models\Clas;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $isUser = fake()->boolean();
        $userId = $isUser ? User::pluck('id')->random() : null;

        return [
            'name' => fake()->name(),
            'father_name' => fake()->name(),
            // 'profile_image' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'father_gaurdian_phone_1' => fake()->phoneNumber(),
            'father_gaurdian_phone_2' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'date_of_joining' => fake()->date(),
            'national_identity_no' => fake()->numerify('#############'),
            'father_national_identity_no' => fake()->numerify('#############'),
            'fees_period' => fake()->randomElement(['monthaly', 'quaterly', 'yearly']),
            'fees' => fake()->numberBetween(1000, 100000),
            'fees_status' => fake()->randomElement(['paid', 'unpaid']),
            'is_user' => $isUser,
            'user_id' => $userId,
            'class_id' => Clas::pluck('id')->random(),
            'section_id' => Section::pluck('id')->random(),
        ];
    }
}
