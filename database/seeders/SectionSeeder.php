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
        $classes = Clas::all();

        foreach ($classes as $key => $class) {
            Section::create([
                'name' => 'A',
                'class_id' => $class->id
            ]);
        }

        DB::table('sections')->where('created_by', null)->update(['created_by'=>1, 'updated_by'=>1]);
    }
}
