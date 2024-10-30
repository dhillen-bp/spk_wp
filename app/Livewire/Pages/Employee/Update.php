<?php

namespace App\Livewire\Pages\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Employee;
use Livewire\Component;

class Update extends Component
{
    public EmployeeForm $form;

    public function mount(Employee $employee)
    {
        $this->form->setEmployee($employee);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('employee'));
        // return $this->redirect('/employee');
    }

    public function render()
    {
        return view('livewire.pages.employee.update')->layout('layouts.app');
    }
}
