<?php

namespace App\Livewire\Pages\EmployeeScore;

use App\Livewire\Forms\EmployeeScoreForm;
use App\Models\Criteria;
use App\Models\Employee;
use App\Models\EmployeeScore;
use Livewire\Component;

class Update extends Component
{
    public EmployeeScoreForm $form;

    public function mount(Employee $employee)
    {
        $this->form->setEmployeeScore($employee);
    }


    public function save()
    {
        $this->form->update();

        return $this->redirect(route('employee_score.index'));
        // return $this->redirect('/employee');
    }
    public function render()
    {
        $employees = Employee::all();
        $criterias = Criteria::all();
        return view('livewire.pages.employee-score.update', [
            'employees' => $employees,
            'criterias' => $criterias
        ])->layout('layouts.app');
    }
}
