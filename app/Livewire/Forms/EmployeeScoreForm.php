<?php

namespace App\Livewire\Forms;

use App\Models\EmployeeScore;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeScoreForm extends Form
{
    public ?EmployeeScore  $employee;

    #[Validate('required')]
    public $employee_id = '';

    #[Validate('required')]
    public $scores = [];

    public function setEmployeeScore(EmployeeScore  $employee)
    {
        $this->employee = $employee;
        $this->employee_id = $employee->employee_id;

        $this->scores = $employee->criteria->map(function ($criteria) {
            return [
                'criteria_id' => $criteria->id,
                'score' => $this->employee->score()->where('criteria_id', $criteria->id)->first()->score ?? 0,
            ];
        })->toArray();
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

        session()->flash('status', 'EmployeeScore successfully added.');
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->employee->update([
            'employee_id' => $this->employee_id,
            'score' => $this->scores,
        ]);
        session()->flash('status', 'EmployeeScore  successfully updated.');
    }
}
