<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\ProveedorRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Proveedor;
use Illuminate\Database\QueryException;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('proveedores.index', ['proveedores' => Proveedor::orderby('codigo')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProveedorRequest $request): RedirectResponse
    {
        $proveedor = Proveedor::create($request->validated());

        return redirect()->route('proveedores.index')
            ->with('mensaje', "Proveedor {$proveedor->nombre} creado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return view('proveedores.show', ['proveedor' => Proveedor::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('proveedores.edit', ['proveedor' => Proveedor::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProveedorRequest $request, string $id): RedirectResponse
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->validated());

        return redirect()->route('proveedores.show', $id)
            ->with('mensaje', "Proveedor {$proveedor->nombre} actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $proveedor = Proveedor::findOrFail($id);

        try {
            $proveedor->delete();
        } catch (QueryException $e) {
            return redirect()->route('proveedores.show', $id)
                ->with('error', "No se puede borrar a {$proveedor->nombre}: tiene partes de proveedor.");
        }

        return redirect()->route('proveedores.index')
            ->with('mensaje', "Proveedor {$proveedor->nombre} eliminado correctamente.");
    }
}
