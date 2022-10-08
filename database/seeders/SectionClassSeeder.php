<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SectionClass::factory(25)->create();
        DB::table('section_classes')->where('created_by', null)->update(['created_by'=>1, 'updated_by'=>1]);
    }
}
