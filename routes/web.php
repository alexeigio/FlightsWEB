<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\FlightController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas públicas
//Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/api/flights/search', [FlightController::class, 'search'])->name('flights.search');
Route::get('/api/flights/{id}', [FlightController::class, 'show'])->name('flights.show');
Route::get('/', [FlightController::class, 'index'])->name('home');


// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/reservations', [FlightController::class, 'index'])->name('reservations');
});

require __DIR__.'/auth.php';
