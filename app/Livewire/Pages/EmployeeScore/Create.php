<?php

namespace App\Livewire\Pages\EmployeeScore;

use App\Livewire\Forms\EmployeeScoreForm;
use App\Models\Criteria;
use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public EmployeeScoreForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect(route('employee_score.index'));
    }

    public function render()
    {
        $employees = Employee::whereDoesntHave('scores')->get();
        $criterias = Criteria::all();
        return view('livewire.pages.employee-score.create', [
            'employees' => $employees,
            'criterias' => $criterias
        ])->layout('layouts.app');
    }
}
