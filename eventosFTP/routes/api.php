<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventosApiController;
use App\Http\Controllers\EventoController;

Route::get('/eventos', [EventosApiController::class, 'index']);
Route::get('/eventos', [EventoController::class, 'obtenerEventos']);
Route::get('eventos', [EventoController::class, 'obtenerEventos']);

Route::get('/concerts', [EventoController::class, 'getEventos']);
