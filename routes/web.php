<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\FlightController;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/reservations', [SiteController::class, 'reservations'])->name('reservations');
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');






/*Route::get('/', function () {
    return view('welcome');
});*/   
