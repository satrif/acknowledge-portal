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
//    ->middleware(['auth'])
    ->name('spasibo-list');

require __DIR__.'/auth.php';
