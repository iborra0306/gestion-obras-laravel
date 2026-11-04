<?php

use Illuminate\Support\Facades\Route;

// Pantalla Principal
Route::get('/', function () {
    return view('home');
});

// CLIENTES
$clientes = [
    1 => ['nombre' => 'Juan', 'apellidos' => 'Pérez López', 'nif' => '12345678Z', 'direccion' => 'Calle Mayor 12', 'cod_postal' => '28013', 'telefono' => '600111222'],
    2 => ['nombre' => 'María', 'apellidos' => 'García Ruiz', 'nif' => '23456789D', 'direccion' => 'Avenida de América 45', 'cod_postal' => '28028', 'telefono' => '600222333'],
    3 => ['nombre' => 'Antonio', 'apellidos' => 'Martínez Sanz', 'nif' => '34567890V', 'direccion' => 'Calle Toledo 8', 'cod_postal' => '28005', 'telefono' => '600333444'],
];

Route::prefix('clientes')->name('clientes.')->group(function () use ($clientes) {

    Route::get('/', fn () => view('clientes.index', ['clientes' => $clientes]))->name('index');
    Route::get('show/{id}', fn (int $id) => view('clientes.show', ['cliente' => $clientes[$id], 'id' => $id]))
         ->whereNumber('id')->name('show');
    Route::get('create', fn () => view('clientes.create', ['clientes' => $clientes]))->name('create');
    Route::get('edit/{id}', fn (int $id) => view('clientes.edit', ['cliente' => $clientes[$id], 'id' => $id]))
         ->whereNumber('id')->name('edit');
});

// OBRAS
$obras = [
    1 => ['codigo' => 'OBR0001', 'descripcion' => 'Reforma integral de cocina', 'cliente_id' => 1, 'total' => 12100.00, 'cobrado' => 12100.00],
    2 => ['codigo' => 'OBR0002', 'descripcion' => 'Cambio de bañera por plato de ducha', 'cliente_id' => 2, 'total' => 3025.00, 'cobrado' => 1500.00],
    3 => ['codigo' => 'OBR0003', 'descripcion' => 'Pintura de vivienda completa', 'cliente_id' => 3, 'total' => 4235.00, 'cobrado' => 0.00],
];

Route::prefix('obras')->name('obras.')->group(function () use ($obras) {

    Route::get('/', fn () => view('obras.index', ['obras' => $obras]))->name('index');
    Route::get('show/{id}', fn (int $id) => view('obras.show', ['obra' => $obras[$id], 'id' => $id]))
         ->whereNumber('id')->name('show');
    Route::get('create', fn () => view('obras.create', ['obras' => $obras]))->name('create');
    Route::get('edit/{id}', fn (int $id) => view('obras.edit', ['obra' => $obras[$id], 'id' => $id]))
         ->whereNumber('id')->name('edit');
});

Route::get('/empresa', function () {
    return config('gestionobras.empresa');
})->name('empresa');