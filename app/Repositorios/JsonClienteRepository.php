<?php

namespace App\Repositorios;

use App\Dominio\Cliente;

final class JsonClienteRepository implements ClienteRepository
{
    public function __construct(
        private readonly string $fichero,
        private readonly ClienteRepository $iniciales,
    ) {
    }

    public function todos(): array
    {
        return array_values($this->leer());
    }

    public function porId(int $id): ?Cliente
    {
        return $this->leer()[$id] ?? null;
    }

    public function guardar(Cliente $cliente): Cliente
    {
        $todos = $this->leer();
        $id = $cliente->id ?? max([0, ...array_keys($todos)]) + 1;
        $todos[$id] = new Cliente($id, $cliente->nombre, $cliente->apellidos, $cliente->nif, $cliente->direccion, $cliente->codPostal, $cliente->telefono, $cliente->creadoPor);

        // LOCK_EX: si dos peticiones escriben a la vez, la segunda espera a la primera.
        file_put_contents($this->fichero, json_encode(array_map(fn (Cliente $c) => get_object_vars($c), $todos), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);

        return $todos[$id];
    }

    /** @return array<int, Cliente> */
    private function leer(): array
    {
        // Mientras no exista el fichero, se parte de los datos de ejemplo.
        if (! is_file($this->fichero)) {
            $clientes = [];
            foreach ($this->iniciales->todos() as $c) {
                $clientes[$c->id] = $c;
            }

            return $clientes;
        }

        return array_map(fn (array $c) => new Cliente(...$c), json_decode((string) file_get_contents($this->fichero), true) ?? []);
    }
}