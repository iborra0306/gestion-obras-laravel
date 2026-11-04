<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ObrasController extends Controller
{
    private array $arrayObras = [
        1 => ['codigo' => 'OBR0001', 'descripcion' => 'Reforma integral de cocina', 'cliente_id' => 1, 'total' => 12100.00, 'cobrado' => 12100.00],
    2 => ['codigo' => 'OBR0002', 'descripcion' => 'Cambio de bañera por plato de ducha', 'cliente_id' => 2, 'total' => 3025.00, 'cobrado' => 1500.00],
    3 => ['codigo' => 'OBR0003', 'descripcion' => 'Pintura de vivienda completa', 'cliente_id' => 3, 'total' => 4235.00, 'cobrado' => 0.00],
    4 => ['codigo' => 'OBR0004', 'descripcion' => 'Rehabilitación de fachada', 'cliente_id' => 5, 'total' => 48400.00, 'cobrado' => 20000.00],
    5 => ['codigo' => 'OBR0005', 'descripcion' => 'Acondicionamiento de local para cafetería', 'cliente_id' => 8, 'total' => 36300.00, 'cobrado' => 36300.00],
    6 => ['codigo' => 'OBR0006', 'descripcion' => 'Reforma de baño principal', 'cliente_id' => 4, 'total' => 7260.00, 'cobrado' => 3630.00],
    7 => ['codigo' => 'OBR0007', 'descripcion' => 'Instalación de suelo laminado', 'cliente_id' => 6, 'total' => 2420.00, 'cobrado' => 0.00],
    8 => ['codigo' => 'OBR0008', 'descripcion' => 'Impermeabilización de terraza', 'cliente_id' => 7, 'total' => 5445.00, 'cobrado' => 5445.00],
    9 => ['codigo' => 'OBR0009', 'descripcion' => 'Sustitución de ventanas', 'cliente_id' => 9, 'total' => 9680.00, 'cobrado' => 4840.00],
    10 => ['codigo' => 'OBR0010', 'descripcion' => 'Reforma integral de vivienda', 'cliente_id' => 10, 'total' => 60500.00, 'cobrado' => 15000.00],
    ];

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
        return view('obras.index', ['obras' => $this->arrayObras]);
    }

    public function show(int $id): View
    {
        abort_unless(isset($this->arrayObras[$id]), 404);

        $obra = $this->arrayObras[$id];
        $cliente = $this->arrayClientes[$obra['cliente_id']];
        $nombreCliente = trim($cliente['nombre'] . ' ' . ($cliente['apellidos'] ?? ''));

        return view('obras.show', ['obra' => $obra,'id' => $id,'cliente' => $nombreCliente,]);
    }

    public function create(): View
    {
        return view('obras.create');
    }

    public function edit(int $id): View
    {
        abort_unless(isset($this->arrayObras[$id]), 404);

        return view('obras.edit', ['obra' => $this->arrayObras[$id], 'id' => $id]);
    }
}
