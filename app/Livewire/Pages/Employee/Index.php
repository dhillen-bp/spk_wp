<?php

namespace App\Livewire\Pages\Employee;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        Employee::destroy($id);

        // Memberi pesan sukses
        session()->flash('message', 'Employee successfully deleted.');

        // Redirect atau refresh
        return redirect()->route('employee');
    }


    public function render()
    {
        $employees = Employee::latest()->paginate(10);
        return view('livewire.pages.employee.index', [
            'employees' => $employees,
        ])->layout('layouts.app');
    }
}
