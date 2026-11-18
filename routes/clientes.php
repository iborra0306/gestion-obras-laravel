<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::controller(ClientesController::class)->prefix('clientes')->name('clientes.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('show/{id}', 'show')->whereNumber('id')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->whereNumber('id')->name('edit');
        Route::put('update/{id}', 'update')->name('update')->whereNumber('id');
        Route::delete('destroy/{id}', 'destroy')->name('destroy')->whereNumber('id');
    });
});
