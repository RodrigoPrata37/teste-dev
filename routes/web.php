<?php

use App\Http\Controllers\ContatosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/contatos/index');
});

Route::get('/contatos', [ContatosController::class, 'index'])->name('contatos.index');
Route::get('/contatos/create', [ContatosController::class, 'create'])->name('contatos.create');
Route::post('/contatos', [ContatosController::class, 'store'])->name('contatos.store');
Route::get('contatos/{id}/edit', [ContatosController::class,'edit'])->name('contatos.edit');
Route::put('contatos/{id}', [ContatosController::class, 'update'])->name('contatos.update');
Route::delete('contatos/{id}', [ContatosController::class, 'destroy'])->name('contatos.destroy');