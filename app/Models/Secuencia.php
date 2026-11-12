<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secuencia extends Model
{
    protected $table = 'secuencias';

    protected $fillable = ['prefijo', 'siguiente'];

    public static function siguiente(string $prefijo): string
    {
        $secuencia = static::firstOrCreate(
            ['prefijo' => $prefijo],
            ['siguiente' => 1],
        );

        $numero = $secuencia->siguiente;
        $secuencia->increment('siguiente');

        return $prefijo . str_pad((string) $numero, 4, '0', STR_PAD_LEFT);
    }
}
