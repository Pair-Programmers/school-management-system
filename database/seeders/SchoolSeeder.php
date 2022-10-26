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
            'fee_submission_due_date' => Carbon::now()->format('Y-m-d'),
        ]);
    }
}
