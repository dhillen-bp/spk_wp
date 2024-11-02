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
        $bestRankings = Ranking::with('employee.scores.criteria')
            ->orderBy('final_score', 'desc')
            ->paginate(10);

        $worstRankings = Ranking::with('employee.scores.criteria')
            ->orderBy('final_score', 'asc')
            ->paginate(10);

        return view('livewire.pages.dashboard', compact('worstRankings', 'bestRankings'))->layout('layouts.app');
    }
}
