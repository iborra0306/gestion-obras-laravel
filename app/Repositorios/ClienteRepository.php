<?php

namespace App\Repositorios;

use App\Dominio\Cliente;

interface ClienteRepository
{
    /** @return list<Cliente> */
    public function todos(): array;

    public function porId(int $id): ?Cliente;

    /** Da de alta el cliente si no tiene id, o sustituye el que ya existe. Devuelve el cliente guardado. */
    public function guardar(Cliente $cliente): Cliente;
}