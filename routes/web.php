<?php

use App\Livewire\Home;
use App\Livewire\Post\Show as PostShow;
use App\Providers\Filament\AlumniPanelProvider;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');


Route::get('/gallery1', function () {
    return view('Alumni Gallery');
});

Route::get('/gallery2', function () {
    return view('Alumni Gallery2');
});

Route::get('/news1', function () {
    return view('News&Updates');
});

Route::get('/news2', function () {
    return view('News&Updates2');
});

Route::get('/event1', function () {
    return view('Upcoming Event');
});

Route::get('/event2', function () {
    return view('Upcoming Event2');
});

Route::get('/applypartnership', function () {
    return view('Apply Partnership');
});

Route::get('/jobsearching1', function () {
    return view('Job Searching');
});

Route::get('/jobsearching2', function () {
    return view('Job Searching2');
});

Route::get('/jobsearching3', function () {
    return view('Job Searching3');
});


