<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $position = [];

        $department = [];

        for ($i = 0; $i < 50; $i++) {
            Employee::create([
                'name' => $faker->name,
                'position' => $faker->randomElement([
                    'Manager', 'Developer', 'Designer', 'Analyst', 'Sales', 'Product Owner'
                ]),
                'department' => $faker->randomElement([
                    'Finance', 'Information Technology', 'Marketing', 'Human Resource', 'Sales', 'Product Development'
                ]),
            ]);
        }
    }
}
