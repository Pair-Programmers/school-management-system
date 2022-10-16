<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            // 'profile_image' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'email' => fake()->safeEmail(),
            'phone_1' => fake()->phoneNumber(),
            'phone_2' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'designation' => fake()->word(),
            'date_of_birth' => fake()->date(),
            'major_subject' => fake()->word(),
            'description' => fake()->sentence(),
            'qualification' => fake()->word(),
            'is_married' => fake()->boolean(),
            'date_of_joining' => fake()->date(),
            'national_identity_no' => fake()->numerify('#############'),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'twitter' => fake()->url(),
            'salary' => fake()->numberBetween(10000, 100000),
            'is_user' => $isUser,
            'user_id' => $userId,
        ];
    }
}
