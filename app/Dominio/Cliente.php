<?php

namespace App\Dominio;

final class Cliente
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $nombre,
        public readonly ?string $apellidos,
        public readonly ?string $nif,
        public readonly string $direccion,
        public readonly ?string $codPostal,
        public readonly string $telefono,
        public readonly ?string $creadoPor = null,
    ) {
    }

    public function nombreCompleto(): string
    {
        return trim($this->nombre . ' ' . $this->apellidos);
    }
}