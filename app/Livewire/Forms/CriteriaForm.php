<?php

namespace App\Livewire\Forms;

use App\Models\Criteria;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CriteriaForm extends Form
{
    public ?Criteria $criteria;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $weight = '';

    #[Validate('required')]
    public $type = '';

    public function setCriteria(Criteria $criteria)
    {
        $this->criteria = $criteria;
        $this->name = $criteria->name;
        $this->weight = $criteria->weight;
        $this->type = $criteria->type;
    }

    public function store()
    {
        $this->validate();

        Criteria::create(
            $this->all()
        );

        session()->flash('status', 'Criteria successfully added.');
    }

    public function update()
    {
        $this->validate();
        $this->criteria->update([
            'name' => $this->name,
            'weight' => $this->weight,
            'type' => $this->type,
        ]);
        session()->flash('status', 'Criteria successfully updated.');
    }
}
