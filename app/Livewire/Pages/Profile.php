<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public ProfileForm $form;

    public function mount()
    {
        $user = Auth::user();
        $this->form->setProfile($user);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('profile'));
    }

    public function render()
    {
        $user = Auth::user();
        return view('livewire.pages.profile', [
            'user' => $user,
        ])->layout('layouts.app');
    }
}
