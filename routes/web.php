<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SolarController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


//Route::get('/', fn () => Inertia::render('SolarForm'));


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/calculadora', function () {
    return Inertia::render('Calculadora');
})->middleware(['auth', 'verified'])->name('calculadora');

Route::get('/relatorio', function () {
    return Inertia::render('Relatorio');
})->middleware(['auth', 'verified'])->name('relatorio');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::post('/calculo', [SolarController::class, 'calcular']);
Route::get('/relatorio-pdf', [SolarController::class, 'baixarRelatorio']);
Route::get('/resultado', [SolarController::class, 'mostrarResultado'])->name('resultado');




require __DIR__.'/auth.php';
