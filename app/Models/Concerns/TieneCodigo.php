<?php

namespace App\Models\Concerns;

use App\Models\Secuencia;

trait TieneCodigo
{
    protected static function bootTieneCodigo(): void
    {
        static::creating(function ($modelo) {
            $modelo->codigo ??= Secuencia::siguiente(static::PREFIJO);
        });
    }
}
