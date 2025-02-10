<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', [HomeController::class, 'index']);

// Rotas para CRUD de Usuários

// Rota para listar usuários
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Rota para criar um novo usuário
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Rota para salvar um novo usuário
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Rota para exibir os detalhes de um usuário
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Rota para editar um usuário
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Rota para atualizar um usuário
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Rota para excluir um usuário
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
