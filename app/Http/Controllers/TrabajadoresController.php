<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\TrabajadorRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Trabajador;
use Illuminate\Database\QueryException;

class TrabajadoresController extends Controller
{
    public function index(): view
    {
        return view('trabajadores.index', ['trabajadores' => Trabajador::orderby('codigo')->paginate(15)]);
    }

    public function show(int $id): View
    {
        return view('trabajadores.show', ['trabajador' => Trabajador::findOrFail($id)]);
    }

    public function create(): View
    {
        return view('trabajadores.create');
    }

    public function edit(int $id): View
    {
        return view('trabajadores.edit', ['trabajador' => Trabajador::findOrFail($id)]);
    }

    public function store(TrabajadorRequest $request): RedirectResponse
    {
        $trabajador = Trabajador::create($request->validated());

        return redirect()->route('trabajadores.index')
                ->with('mensaje', "Trabajador {$trabajador->nombre} creado correctamente");
    }

    public function update(TrabajadorRequest $request, int $id): RedirectResponse
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->update($request->validated());

        return redirect()->route('trabajadores.show', $id)
            ->with('mensaje', "Trabajador {$trabajador->nombre} actualizado correctamente");
    }

    public function destroy(int $id): RedirectResponse
    {
        $trabajador = Trabajador::findOrFail($id);
        
        try {
            $trabajador->delete();
        } catch (QueryException $e) {
            return redirect()->route('trabajadores.show', $id)
                ->with('error', "No se puede borrar a {$trabajador->nombre_completo}: tiene partes de trabajo.");
        }

        return redirect()->route('trabajadores.index')
            ->with('mensaje', "Trabajador {$trabajador->nombre} eliminado correctamente.");
    }
}
