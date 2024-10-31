<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use App\Models\EmployeeScore;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;

class EmployeeScoreForm extends Form
{
    public ?Employee $employee;

    #[Validate('required')]
    public $employee_id = '';

    #[Validate('required')]
    public $scores = [];

    public function setEmployeeScore(Employee $employee)
    {
        $this->employee = $employee;
        $this->employee_id = $employee->id;

        // Cek dan set skor jika ada, jika tidak berikan default []
        $this->scores = $employee->scores->isNotEmpty()
            ? $employee->scores->mapWithKeys(function ($score) {
                return [$score->criteria_id => $score->score];
            })->toArray()
            : [];
    }

    public function store()
    {
        $this->validate();

        foreach ($this->scores as $criteriaId => $score) {
            EmployeeScore::create([
                'employee_id' => $this->employee_id,
                'criteria_id' => $criteriaId,
                'score' =>  $score,
            ]);
        }

        Toaster::success('Employee Scores successfully created!');
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        foreach ($this->scores as $criteriaId => $score) {
            EmployeeScore::updateOrCreate(
                [
                    'employee_id' => $this->employee_id,
                    'criteria_id' => $criteriaId,
                ],
                [
                    'score' => $score,
                ]
            );
        }

        Toaster::success('Employee Scores successfully updated!');
    }
}
