<?php

namespace App\Livewire\Pages\Employee;

use App\Models\Employee;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $position = '';

    #[Validate('required')]
    public $department = '';

    public function store()
    {
        $this->validate();

        Employee::create(
            $this->only(['name', 'position', 'department'])
        );

        session()->flash('status', 'Post successfully updated.');

        return redirect()->route('employee');
    }

    public function render()
    {
        return view('livewire.pages.employee.create')->layout('layouts.app');
    }
}
