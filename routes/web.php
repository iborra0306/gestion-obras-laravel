<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

require __DIR__ . '/clientes.php';
require __DIR__ . '/obras.php';
require __DIR__ . '/trabajadores.php';

// Pantalla Principal
Route::get('/', HomeController::class);

/*
Route::get('/empresa', function () {
    return config('gestionobras.empresa');
})->name('empresa');*/