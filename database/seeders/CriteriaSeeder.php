<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Responsibility',
                'weight' => 40,
                'type' => 'benefit',
            ],
            [
                'name' => 'Discipline',
                'weight' => 30,
                'type' => 'benefit',
            ],
            [
                'name' => 'Professionalism',
                'weight' => 30,
                'type' => 'benefit',
            ],
        ];

        foreach ($data as $item) {
            Criteria::create($item);
        }
    }
}
