<?php

namespace Database\Seeders;

use App\Models\School;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\SectionClass::factory(25)->create();

        School::create([
            'name' => 'Malhoc School',
            'tagline' => 'A project of superior group of colleges',
            'campus_name' => 'ABC CAMPUS',
            'phone' => '0323-9991999, 0323-9991999',
            'email' => 'malhoc.tech@gmail.com',
        ]);
    }
}
