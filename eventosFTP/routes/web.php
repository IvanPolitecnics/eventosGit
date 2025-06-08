<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;


// Autentificacion
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Vistas
Route::get('/', function () {
    return view('inicio');
});

Route::get('calendario', function () {
    return view('calendario');
});

Route::get('/formulario', function () {
    return view('formulario');
})->name('formulario');

// Creo que deberia eliminar esta
Route::get('/eventos', [EventoController::class, 'obtenerEventos']);

Route::get('/formulario', [EventoController::class, 'create'])->name('formulario');

Route::get('/eventos', [EventoController::class, 'index'])->name('index');

// Guardar el evento
Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');

Route::get('/tipos-eventos', [TipoEventoController::class, 'index'])->name('tipos_eventos.index');

// Mostrar el formulario de creación de tipo de evento
Route::get('/tipos-eventos/create', [TipoEventoController::class, 'create'])->name('tipos_eventos.create');

// Guardar el nuevo tipo de evento
Route::post('/tipos-eventos', [TipoEventoController::class, 'store'])->name('tipos_eventos.store');


Route::get('/', [EventoController::class, 'index']);

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
