<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Employee;
use App\Models\EmployeeScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $employees = Employee::all(); // Ambil semua employee
        $criterias = Criteria::all(); // Ambil semua criteria

        foreach ($employees as $employee) {
            foreach ($criterias as $criteria) {
                EmployeeScore::create([
                    'employee_id' => $employee->id,
                    'criteria_id' => $criteria->id,
                    'score' => $faker->numberBetween(1, 100), // Nilai acak antara 1 hingga 100
                ]);
            }
        }
    }
}
