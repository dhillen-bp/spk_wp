<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/dashboard', App\Livewire\Pages\Dashboard::class)->name('dashboard');
Route::get('/employee', App\Livewire\Pages\Employee\Index::class)->name('employee');
Route::get('/employee/create', App\Livewire\Pages\Employee\Create::class)->name('employee.create');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
