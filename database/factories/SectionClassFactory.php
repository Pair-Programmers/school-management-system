<?php

namespace Database\Factories;

use App\Models\Clas;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SectionClass>
 */
class SectionClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'class_id' => Clas::pluck('id')->random(),
            'section_id' => Section::pluck('id')->random(),
        ];
    }
}
