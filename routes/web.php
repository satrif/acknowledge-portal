<?php

use App\Livewire\SpasiboJournalList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/spasibo', SpasiboJournalList::class)
    ->middleware(['auth'])
    ->name('spasibo-list');

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/spasibo/public/livewire/update', $handle);
});

require __DIR__.'/auth.php';
