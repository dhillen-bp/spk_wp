<?php

namespace App\Livewire\Pages\Criteria;

use App\Livewire\Forms\CriteriaForm;
use Livewire\Component;

class Create extends Component
{
    public CriteriaForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect(route('criteria.index'));
    }

    public function render()
    {
        return view('livewire.pages.criteria.create')->layout('layouts.app');
    }
}
