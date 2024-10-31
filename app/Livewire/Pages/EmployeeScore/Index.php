<?php

namespace App\Livewire\Pages\EmployeeScore;

use App\Models\Criteria;
use App\Models\Employee;
use App\Models\EmployeeScore;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function destroy($employeeId)
    {
        // Menghapus semua nilai EmployeeScore berdasarkan employee_id
        EmployeeScore::where('employee_id', $employeeId)->delete();

        Toaster::success('Employee Scores successfully deleted!');

        $this->redirect(route('employee_score.index'));
    }

    public function render()
    {
        $employees = Employee::with(['scores.criteria'])
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%') // Mencari berdasarkan nama employee
                    ->orWhereHas('scores', function ($query) {
                        // Mencari berdasarkan nilai score
                        $query->where('score', 'like', '%' . $this->search . '%')
                            ->orWhereHas('criteria', function ($query) {
                                // Mencari berdasarkan nama criteria melalui relasi scores
                                $query->where('name', 'like', '%' . $this->search . '%');
                            });
                    });
            })
            ->latest()
            ->paginate(10);

        $criterias = Criteria::all();

        return view('livewire.pages.employee-score.index', [
            'employees' => $employees,
            'criterias' => $criterias,
        ])->layout('layouts.app');
    }
}
