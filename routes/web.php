<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinos/{id}', [DestinationController::class, 'show'])->name('destinations.show');
Route::post('/destinos/{id}/contacto', [DestinationController::class, 'sendContact'])->name('destinations.contact');