<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\RedirectResponse;

class ClientesController extends Controller
{
    // Datos de prueba hasta el Bloque 6: pega aquí el contenido de array_clientes.php
    private array $arrayClientes = [
        1 => ['nombre' => 'Juan', 'apellidos' => 'Pérez López', 'nif' => '12345678Z', 'direccion' => 'Calle Mayor 12', 'cod_postal' => '28013', 'telefono' => '600111222'],
        2 => ['nombre' => 'María', 'apellidos' => 'García Ruiz', 'nif' => '23456789D', 'direccion' => 'Avenida de América 45', 'cod_postal' => '28028', 'telefono' => '600222333'],
        3 => ['nombre' => 'Antonio', 'apellidos' => 'Martínez Sanz', 'nif' => '34567890V', 'direccion' => 'Calle Toledo 8', 'cod_postal' => '28005', 'telefono' => '600333444'],
        4 => ['nombre' => 'Lucía', 'apellidos' => 'Fernández Gil', 'nif' => '45678901G', 'direccion' => 'Paseo de la Castellana 100', 'cod_postal' => '28046', 'telefono' => '600444555'],
        5 => ['nombre' => 'Comunidad de Propietarios', 'apellidos' => 'Calle Alcalá 200', 'nif' => 'H12345678', 'direccion' => 'Calle Alcalá 200', 'cod_postal' => '28028', 'telefono' => '910555666'],
        6 => ['nombre' => 'Javier', 'apellidos' => 'Romero Díaz', 'nif' => null, 'direccion' => 'Calle Atocha 30', 'cod_postal' => '28012', 'telefono' => '600666777'],
        7 => ['nombre' => 'Carmen', 'apellidos' => 'Navarro Torres', 'nif' => '67890123K', 'direccion' => 'Calle Princesa 15', 'cod_postal' => '28008', 'telefono' => '600777888'],
        8 => ['nombre' => 'Hostelería Sol S.L.', 'apellidos' => null, 'nif' => 'B87654321', 'direccion' => 'Puerta del Sol 4', 'cod_postal' => '28013', 'telefono' => '910888999'],
        9 => ['nombre' => 'Pedro', 'apellidos' => 'Jiménez Moreno', 'nif' => '89012345M', 'direccion' => 'Calle Bravo Murillo 77', 'cod_postal' => '28020', 'telefono' => '600999000'],
        10 => ['nombre' => 'Elena', 'apellidos' => 'Ortega Vidal', 'nif' => '90123456A', 'direccion' => 'Calle Serrano 50', 'cod_postal' => '28001', 'telefono' => '601000111'],
    ];

    public function index(): View
    {
        return view('clientes.index', ['clientes' => $this->arrayClientes]);
    }

    public function show(int $id): View
    {
        abort_unless(isset($this->arrayClientes[$id]), 404);

        return view('clientes.show', ['cliente' => $this->arrayClientes[$id], 'id' => $id]);
    }

    public function create(): View
    {
        return view('clientes.create');
    }

    public function edit(int $id): View
    {
        abort_unless(isset($this->arrayClientes[$id]), 404);

        return view('clientes.edit', ['cliente' => $this->arrayClientes[$id], 'id' => $id]);
    }

    public function store(ClienteRequest $request): RedirectResponse
    {
        $datos = $request->validated();

        return redirect()->route('clientes.index')
                ->with('mensaje', "Cliente {$datos['nombre']} creado correctamente.");
    }

    public function update(ClienteRequest $request, int $id): RedirectResponse
    {
        abort_unless(isset($this->arrayClientes[$id]), 404);

        $datos = $request->validated();

        return redirect()->route('clientes.show', $id)
                ->with('mensaje', "Cliente {$datos['nombre']} actualizado correctamente");
    }

}
