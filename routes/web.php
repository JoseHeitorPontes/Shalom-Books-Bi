<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
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

Route::controller(CustomerController::class)->prefix('/clientes')->group(function () {
    Route::get('/', 'index')->name('clientes.index');
    Route::post('/', 'store')->name('clientes.store');
    Route::get('/novo', 'newCustomer')->name('clientes.newCustomer');
    Route::get('/{id}/editar', 'editCustomer')->name('clientes.editCustomer');
    Route::post('/{id}', 'update')->name('clientes.update');
    Route::post('/{id}', 'destroy')->name('clientes.destroy');
});
