<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            'Arts and Sciences',
            'Business Administration',
            'Computer Science',
            'Education',
            'Engineering',
            'Health Sciences',
            'Law',
            'Nursing',
            'Pharmacy',
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => 'College of ' . $department,
            ]);
        }
    }
}
