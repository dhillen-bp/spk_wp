<?php

namespace App\Livewire\Pages\Criteria;

use App\Livewire\Forms\CriteriaForm;
use App\Models\Criteria;
use Livewire\Component;

class Update extends Component
{
    public CriteriaForm $form;

    public function mount(Criteria $criteria)
    {
        $this->form->setCriteria($criteria);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('criteria.index'));
        // return $this->redirect('/employee');
    }

    public function render()
    {
        return view('livewire.pages.criteria.update')->layout('layouts.app');
    }
}
