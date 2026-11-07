<?php

namespace App\Repositorios;

use App\Dominio\Cliente;

final class ArrayClienteRepository implements ClienteRepository
{
    /** @var array<int, Cliente> Los clientes, indexados por su id. */
    private array $clientes = [];

    public function __construct()
    {
        foreach (require resource_path('datos/array_clientes.php') as $id => $c) {
            $this->clientes[$id] = new Cliente($id, $c['nombre'], $c['apellidos'], $c['nif'], $c['direccion'], $c['cod_postal'], $c['telefono']);
        }
    }

    public function todos(): array
    {
        return array_values($this->clientes);
    }

    public function porId(int $id): ?Cliente
    {
        return $this->clientes[$id] ?? null;
    }

    public function guardar(Cliente $cliente): Cliente
    {
        $id = $cliente->id ?? max([0, ...array_keys($this->clientes)]) + 1;

        return $this->clientes[$id] = new Cliente($id, $cliente->nombre, $cliente->apellidos, $cliente->nif, $cliente->direccion, $cliente->codPostal, $cliente->telefono, $cliente->creadoPor);
    }
}