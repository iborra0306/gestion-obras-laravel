<?php

namespace App;

trait TieneCodigo
{
    protected static function bootTieneCodigo(): void
    {
        static::creating(function ($modelo) {
            $modelo->codigo ??= Secuencia::siguiente(static::PREFIJO);
        });
    }
}
