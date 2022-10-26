<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Clas;
use App\Models\Section;
use App\Models\SectionClass;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::makeDirectory('public/images');
        Storage::makeDirectory('public/files/samples');

        User::create([
            'name'=>'Hamza Saqib',
            'email'=>'mianhamza7262@gmail.com',
            'phone'=>'+92 323 9991999',
            'is_active'=>true,
            'role'=>'Developer',
            'password'=>Hash::make('hamza7262')
        ]);

        $this->call([
            SchoolSeeder::class,
            ClasSeeder::class,
            SectionSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            AcademicYearSeeder::class,
        ]);

        for ($i=0; $i < 15; $i++) {
            SectionClass::create([
                'class_id' => Clas::pluck('id')->random(),
                'section_id' => Section::pluck('id')->random()
            ]);
        }
        DB::table('section_classes')->where('created_by', null)->update(['created_by'=>1, 'updated_by'=>1]);
        // \App\Models\Clas::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
