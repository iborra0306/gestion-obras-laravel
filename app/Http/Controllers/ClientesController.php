<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientesController extends Controller
{
    public function index(): View
    {
        return view('clientes.index', ['clientes' => Cliente::orderBy('codigo')->paginate(15)]);
    }

    public function show(int $id): View
    {
        return view('clientes.show', ['cliente' => Cliente::findOrFail($id)]);
    }

    public function create(): View
    {
        return view('clientes.create');
    }

    public function edit(int $id): View
    {
        return view('clientes.edit', ['cliente' => Cliente::findOrFail($id)]);
    }

    public function store(ClienteRequest $request): RedirectResponse
    {
        $cliente = Cliente::create($request->validated());

        return redirect()->route('clientes.index')
            ->with('mensaje', "Cliente {$cliente->nombre} creado correctamente.");
    }

    public function update(ClienteRequest $request, int $id): RedirectResponse
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->validated());

        return redirect()->route('clientes.show', $id)
            ->with('mensaje', "Cliente {$cliente->nombre} actualizado correctamente.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('mensaje', "Cliente {$cliente->nombre} eliminado correctamente.");
    }
}