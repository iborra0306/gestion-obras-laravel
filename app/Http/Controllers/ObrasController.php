<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObraRequest;
use App\Repositorios\ClienteRepository;
use Illuminate\Http\RedirectResponse;
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

    public function __construct(
        private readonly ClienteRepository $clientes,
    ) {
    }

    public function index(): View
    {
        return view('obras.index', ['obras' => $this->arrayObras]);
    }

    public function show(int $id): View
    {
        abort_unless(isset($this->arrayObras[$id]), 404);

        $obra = $this->arrayObras[$id];
        $cliente = $this->clientes->porId($obra['cliente_id']);

        return view('obras.show', [
            'obra' => $obra,
            'id' => $id,
            'cliente' => $cliente?->nombreCompleto() ?? '',
        ]);
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

    public function store(ObraRequest $request): RedirectResponse
    {
        $datos = $request->validated();

        return redirect()->route('obras.index')
            ->with('mensaje', "Obra {$datos['codigo']} creada correctamente.");
    }

    public function update(ObraRequest $request, int $id): RedirectResponse
    {
        abort_unless(isset($this->arrayObras[$id]), 404);

        $datos = $request->validated();

        return redirect()->route('obras.show', $id)
            ->with('mensaje', "Obra {$datos['codigo']} actualizada correctamente.");
    }
}