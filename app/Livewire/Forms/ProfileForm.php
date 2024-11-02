<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;

class ProfileForm extends Form
{
    public ?User $user;

    public $name;
    public $email;
    public $password;

    public function setProfile(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|min:6|confirmed', // Password harus terkonfirmasi jika diisi
        ];
    }

    public function update()
    {
        $this->validate();

        // Buat array data untuk pembaruan
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        // Tambahkan password jika diisi
        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        // Perbarui pengguna
        $this->user->update($data);

        Toaster::success('Profile successfully updated!');
    }
}
