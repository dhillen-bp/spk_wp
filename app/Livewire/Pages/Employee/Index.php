<?php

namespace App\Livewire\Pages\Employee;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function destroy($id)
    {
        Employee::destroy($id);

        // Memberi pesan sukses
        Toaster::success('Employee successfully deleted!');

        // Redirect atau refresh
        $this->redirect(route('employee.index'));
    }


    public function render()
    {
        $employees = Employee::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('position', 'like', '%' . $this->search . '%')
                    ->orWhere('department', 'like', '%' . $this->search . '%');
            })->latest()->paginate(10);

        return view('livewire.pages.employee.index', [
            'employees' => $employees,
        ])->layout('layouts.app');
    }
}
