<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/dashboard', App\Livewire\Pages\Dashboard::class)->name('dashboard')->middleware(['auth']);

Route::prefix('employee')->name('employee.')->middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Pages\Employee\Index::class)->name('index');
    Route::get('/create', App\Livewire\Pages\Employee\Create::class)->name('create');
    Route::get('/edit/{employee}', App\Livewire\Pages\Employee\Update::class)->name('edit');
});

Route::prefix('employee_score')->name('employee_score.')->middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Pages\EmployeeScore\Index::class)->name('index');
    Route::get('/create', App\Livewire\Pages\EmployeeScore\Create::class)->name('create');
    Route::get('/edit/{employee}', App\Livewire\Pages\EmployeeScore\Update::class)->name('edit');
});

Route::prefix('criteria')->name('criteria.')->middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Pages\Criteria\Index::class)->name('index');
    Route::get('/create', App\Livewire\Pages\Criteria\Create::class)->name('create');
    Route::get('/edit/{criteria}', App\Livewire\Pages\Criteria\Update::class)->name('edit');
});

Route::prefix('calculate')->name('calculate.')->middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Pages\Calculate\Index::class)->name('index');
});
Route::prefix('ranking')->name('ranking.')->middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Pages\Ranking\Index::class)->name('index');
});

Route::get('/profile', App\Livewire\Pages\Profile::class)
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
