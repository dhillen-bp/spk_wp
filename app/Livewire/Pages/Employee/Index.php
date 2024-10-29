<?php

namespace App\Livewire\Pages\Employee;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $employees = Employee::latest()->paginate(10);
        return view('livewire.pages.employee.index', [
            'employees' => $employees,
        ])->layout('layouts.app');
    }
}
