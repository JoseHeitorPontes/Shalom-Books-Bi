<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BookController::class)->prefix('/livros')->group(function () {
    Route::get('/', 'index')->name('livros.index');
    Route::post('/', 'store')->name('livros.store');
    Route::get('/novo', 'newBook')->name('livros.newBook');
    Route::get('/{id}/editar', 'editBook')->name('livros.editBook');
    Route::put('/{id}', 'update')->name('livros.update');
    Route::delete('/{id}', 'destroy')->name('livros.destroy');
});
