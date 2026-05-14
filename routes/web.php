<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;

// Página inicial redireciona para missas
Route::get('/', function () {
    return redirect()->route('missas.index');
});

// US001 - Horários de Missas
Route::get('/missas', [MissaController::class, 'index'])->name('missas.index');

// US002 - Eventos e Festas
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');

// US003 - Cadastro
Route::get('/cadastro', [AuthController::class, 'showCadastro'])->name('cadastro.form');
Route::post('/cadastro', [AuthController::class, 'cadastrar'])->name('cadastro.store');

// US004 - Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Área autenticada
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');
