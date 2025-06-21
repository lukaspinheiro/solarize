<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/planos', function () {
    return view('pages.planos');
})->name('planos');

Route::get('/contato', function () {
    return view('pages.contato');
})->name('contato');

Route::get('/sobre', function () {
    return view('pages.sobre');
})->name('sobre');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
