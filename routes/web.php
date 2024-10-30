<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/dashboard', App\Livewire\Pages\Dashboard::class)->name('dashboard')->middleware(['auth']);
Route::get('/employee', App\Livewire\Pages\Employee\Index::class)->name('employee')->middleware(['auth']);
Route::get('/employee/create', App\Livewire\Pages\Employee\Create::class)->name('employee.create')->middleware(['auth']);
Route::get('/employee/edit/{employee}', App\Livewire\Pages\Employee\UPdate::class)->name('employee.edit')->middleware(['auth']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
