<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/planos', function () {
    return Inertia::render('Planos');
})->name('planos');

Route::get('/contato', function () {
    return Inertia::render('Contato');
})->name('contato');

Route::get('/sobre', function () {
    return Inertia::render('Sobre');
})->name('sobre');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';