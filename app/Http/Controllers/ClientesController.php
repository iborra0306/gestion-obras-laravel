<?php

namespace App\Http\Controllers;

use App\Dominio\Cliente;
use App\Http\Requests\ClienteRequest;
use App\Repositorios\ClienteRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientesController extends Controller
{
    public function __construct(
        private readonly ClienteRepository $clientes,
    ) {
    }

    public function index(): View
    {
        return view('clientes.index', ['clientes' => $this->clientes->todos()]);
    }

    public function show(int $id): View
    {
        $cliente = $this->clientes->porId($id);

        abort_if($cliente === null, 404);

        return view('clientes.show', ['cliente' => $cliente]);
    }

    public function create(): View
    {
        return view('clientes.create');
    }

    public function edit(int $id): View
    {
        $cliente = $this->clientes->porId($id);

        abort_if($cliente === null, 404);

        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function store(ClienteRequest $request): RedirectResponse
    {
        $datos = $request->validated();

        $this->clientes->guardar(new Cliente(
            null,
            $datos['nombre'],
            $datos['apellidos'] ?? null,
            $datos['nif'] ?? null,
            $datos['direccion'],
            $datos['cod_postal'] ?? null,
            $datos['telefono'],
            $request->user()->name,
        ));

        return redirect()->route('clientes.index')
            ->with('mensaje', "Cliente {$datos['nombre']} creado correctamente.");
    }

    public function update(ClienteRequest $request, int $id): RedirectResponse
    {
        $cliente = $this->clientes->porId($id);

        abort_if($cliente === null, 404);

        $datos = $request->validated();

        $this->clientes->guardar(new Cliente(
            $id,
            $datos['nombre'],
            $datos['apellidos'] ?? null,
            $datos['nif'] ?? null,
            $datos['direccion'],
            $datos['cod_postal'] ?? null,
            $datos['telefono'],
            $cliente->creadoPor,
        ));

        return redirect()->route('clientes.show', $id)
            ->with('mensaje', "Cliente {$datos['nombre']} actualizado correctamente.");
    }
}