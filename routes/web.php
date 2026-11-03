<?php

use Illuminate\Support\Facades\Route;

// Pantalla Principal
Route::get('/', function () {
    return 'Pantalla principal';
});

// CLIENTES
Route::prefix('clientes')->name('clientes.')->group(function () {
    Route::get('/', function () { 
        return 'Listado de clientes';
    })->name('index');

    Route::get('/show/{id}', function ($id) { 
        return 'Detalle del cliente ' . $id;
    })->whereNumber('id')->name('show');

    Route::get('create', function () {
        return 'Nuevo cliente'; 
    })->name('create');

    Route::get('/edit/{id}', function ($id) {
        return 'Modificar cliente ' . $id; 
    })->whereNumber('id')->name('edit');
});

// OBRAS
Route::prefix('obras')->name('obras.')->group(function () {
    Route::get('/', function () { 
        return 'Listado de obras';
    })->name('index');

    Route::get('/show/{id}', function ($id) { 
        return 'Detalle de la obra ' . $id;
    })->whereNumber('id')->name('show');

    Route::get('create', function () {
        return 'Nueva obra'; 
    })->name('create');

    Route::get('/edit/{id}', function ($id) {
        return 'Modificar obra ' . $id; 
    })->whereNumber('id')->name('edit');
});

Route::get('/empresa', function () {
    return config('gestionobras.empresa');
})->name('empresa');