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
            'name' => 'The Spirit School',
            'tagline' => 'A project of superior group of colleges',
            'campus_name' => 'KAHNA CAMPUS',
            'phone' => '0323-4180805, 0324-4873686',
            'email' => 'pr.lhr.kna@tss.edu.pk',
        ]);
    }
}
