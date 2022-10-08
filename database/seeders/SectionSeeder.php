<?php

namespace Database\Seeders;

use App\Models\Clas;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            'A',
            'B',
            'C',
            'D',
            'E',
        ];

        foreach ($sections as $key => $section) {
            Section::create([
                'name' => $section,
                'class_id' => Clas::pluck('id')->random()
            ]);
        }

        DB::table('sections')->where('created_by', null)->update(['created_by'=>1, 'updated_by'=>1]);
    }
}
