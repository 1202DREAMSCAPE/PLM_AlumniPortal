<?php

use App\Livewire\Home;
use App\Livewire\Post\Show as PostShow;
use App\Providers\Filament\AlumniPanelProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\VerifyController;

Route::get('/verify', [VerifyController::class, 'verify'])
    ->name('verify');

Route::post('/submit-partnership', [PartnershipController::class, 'submitPartnership'])->name('submit-partnership');


// Route::get('/', Home::class)->name('home');
// Route::get('/article/{post:slug}', PostShow::class)->name('post.show');