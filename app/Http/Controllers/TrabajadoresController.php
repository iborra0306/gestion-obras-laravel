<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\TrabajadorRequest;
use Illuminate\Http\RedirectResponse;

class TrabajadoresController extends Controller
{
     private array $arrayTrabajadores = [
        1 => ['nombre' => 'Luis', 'apellido' => 'Sánchez', 'tipo' => 'Encargado', 'telefono' => '611000001', 'coste_hora_estandar' => 28.00],
        2 => ['nombre' => 'Andrés', 'apellido' => 'Molina', 'tipo' => 'Oficial de 1ª', 'telefono' => '611000002', 'coste_hora_estandar' => 24.00],
        3 => ['nombre' => 'Rocío', 'apellido' => 'Castro', 'tipo' => 'Oficial de 1ª', 'telefono' => '611000003', 'coste_hora_estandar' => 24.00],
        4 => ['nombre' => 'David', 'apellido' => 'Herrera', 'tipo' => 'Oficial de 2ª', 'telefono' => '611000004', 'coste_hora_estandar' => 22.00],
        5 => ['nombre' => 'Sergio', 'apellido' => 'Ramos', 'tipo' => 'Peón', 'telefono' => '611000005', 'coste_hora_estandar' => 20.00],
        6 => ['nombre' => 'Iván', 'apellido' => 'Prieto', 'tipo' => 'Peón', 'telefono' => '611000006', 'coste_hora_estandar' => 20.00],
        7 => ['nombre' => 'Marta', 'apellido' => 'Vega', 'tipo' => 'Oficial de 2ª', 'telefono' => '611000007', 'coste_hora_estandar' => 22.00],
        8 => ['nombre' => 'Óscar', 'apellido' => 'Blanco', 'tipo' => 'Peón', 'telefono' => null, 'coste_hora_estandar' => 20.00],
        9 => ['nombre' => 'Raúl', 'apellido' => 'Méndez', 'tipo' => 'Oficial de 1ª', 'telefono' => '611000009', 'coste_hora_estandar' => 25.00],
        10 => ['nombre' => 'Nuria', 'apellido' => 'Campos', 'tipo' => 'Peón', 'telefono' => '611000010', 'coste_hora_estandar' => 20.00],
    ];

    public function index(): view
    {
        return view('trabajadores.index', ['trabajadores' => $this->arrayTrabajadores]);
    }

    public function show(int $id): View
    {
        abort_unless(isset($this->arrayTrabajadores[$id]), 404);

        return view('trabajadores.show', ['trabajador' => $this->arrayTrabajadores[$id], 'id' => $id]);
    }

    public function create(): View
    {
        return view('trabajadores.create');
    }

    public function edit(int $id): View
    {
        abort_unless(isset($this->arrayTrabajadores[$id]), 404);

        return view('trabajadores.edit', ['trabajador' => $this->arrayTrabajadores[$id], 'id' => $id]);
    }

    public function store(TrabajadorRequest $request): RedirectResponse
    {
        $datos = $request->validated();

        return redirect()->route('trabajadores.index')
                ->with('mensaje', "Trabajador {$datos['nombre']} creado correctamente");
    }

    public function update(TrabajadorRequest $request, int $id): RedirectResponse
    {
        abort_unless(isset($this->arrayTrabajadores[$id]), 404);

        $datos = $request->validated();

        return redirect()->route('trabajadores.show', $id)
            ->with('mensaje', "Trabajador {$datos['nombre']} actualizado correctamente");
    }
}
