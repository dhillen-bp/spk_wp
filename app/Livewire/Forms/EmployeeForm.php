<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;

class EmployeeForm extends Form
{
    public ?Employee $employee;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $position = '';

    #[Validate('required')]
    public $department = '';

    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
        $this->name = $employee->name;
        $this->position = $employee->position;
        $this->department = $employee->department;
    }

    public function store()
    {
        $this->validate();

        Employee::create(
            $this->all()
        );

        Toaster::success('Employee successfully created!');

        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->employee->update([
            'name' => $this->name,
            'position' => $this->position,
            'department' => $this->department,
        ]);
        Toaster::success('Employee successfully updated!');
    }
}
