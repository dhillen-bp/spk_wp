<?php

namespace App\Livewire\Pages\Criteria;

use App\Models\Criteria;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $totalWeight;

    public $search = '';

    public function destroy($id)
    {
        Criteria::destroy($id);

        // Memberi pesan sukses
        session()->flash('message', 'Criteria successfully deleted.');

        // Redirect atau refresh
        $this->redirect(route('criteria.index'));
    }

    public function render()
    {
        $criterias = Criteria::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('weight', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%');
            })->latest()->paginate(10);

        $this->totalWeight = Criteria::sum('weight');

        return view('livewire.pages.criteria.index', [
            'criterias' => $criterias, 'totalWeight' => $this->totalWeight,
        ])->layout('layouts.app');
    }
}
