<?php

namespace App\Livewire\Pages;

use App\Models\Employee;
use App\Models\Ranking;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalEmployees;
    public $topScorer;
    public $averageScore;
    public $departmentsRated;

    public function mount()
    {
        $this->totalEmployees = Employee::count();

        $this->topScorer = Ranking::with('employee')
            ->orderBy('final_score', 'desc')
            ->first();

        $this->averageScore = Ranking::average('final_score');

        $this->departmentsRated = Employee::distinct('department')->count('department');
    }

    public function render()
    {
        return view('livewire.pages.dashboard')->layout('layouts.app');
    }
}
