<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseCategory::create(['name'=>'Rent', 'created_by'=>1]);
        ExpenseCategory::create(['name'=>'Electricity', 'created_by'=>1]);
        ExpenseCategory::create(['name'=>'Gas', 'created_by'=>1]);
        ExpenseCategory::create(['name'=>'Employee Salary', 'created_by'=>1]);
        ExpenseCategory::create(['name'=>'Mentainance', 'created_by'=>1]);
        ExpenseCategory::create(['name'=>'Cleaning', 'created_by'=>1]);
    }
}
