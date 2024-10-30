<?php

namespace App\Livewire\Pages\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Livewire\Forms\PostForm;
use Livewire\Component;

class Create extends Component
{
    public EmployeeForm $form;

    public function save()
    {

        $this->form->store();

        // return $this->redirect(route('employee'));
        return $this->redirect('/employee');
    }

    public function render()
    {
        return view('livewire.pages.employee.create')->layout('layouts.app');
    }
}
