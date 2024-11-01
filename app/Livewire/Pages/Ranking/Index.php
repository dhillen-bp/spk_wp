<?php

namespace App\Livewire\Pages\Ranking;

use App\Models\Ranking;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $rankings = Ranking::with('employee')
            ->where(function ($query) {
                $query->where('final_score', 'like', '%' . $this->search . '%')
                    ->orWhereHas('employee', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy('final_score', 'desc')
            ->paginate(10);

        return view('livewire.pages.ranking.index', [
            'rankings' => $rankings
        ])->layout('layouts.app');
    }
}
