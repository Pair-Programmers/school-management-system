<?php

namespace Database\Seeders;

use App\Models\Clas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            'Play Group',
            'Nursary',
            'KG',
            'One',
            'Two',
            'Three',
            'Four',
            'Five',
            'Six',
            'Seven',
            'Eight',
            'Pre. Nine',
            'Nine',
            'Ten',
        ];

        foreach ($classes as $key => $class) {
            Clas::create([
                'name'=>$class,
                'slug'=>Str::slug($class)
            ]);
        }

        DB::table('classes')->where('created_by', null)->update(['created_by'=>1, 'updated_by'=>1]);
    }
}
