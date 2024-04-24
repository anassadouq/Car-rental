<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ReservationController;

// Apply 'auth' middleware to restrict access to logged-in users
Route::middleware(['auth'])->group(function () {
    Route::resource('/', HomeController::class);
    Route::resource('/client', ClientController::class);
    Route::resource('/voiture', VoitureController::class);
    Route::resource('/reservation', ReservationController::class);
    Route::get('/reservation/{clientId}/pdf', [ReservationController::class, 'reservation'])->name('reservation.pdf');});

Auth::routes();