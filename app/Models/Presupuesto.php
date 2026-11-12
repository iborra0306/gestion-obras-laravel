<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Presupuesto extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'PREP';

    protected $table = 'presupuestos';

    protected $fillable = ['fecha', 'cliente_id', 'obra_id', 'nombre_cliente', 'nif', 'direccion', 'telefono', 'iva', 'estado'];

    protected function casts(): array
    {
        return [
            'fecha' => 'date:Y-m-d',
            'iva'   => 'float',
        ];
    }

    protected $attributes = [
        'iva'    => 21,
        'estado' => 'no_aprobado',
    ];

    protected static function booted(): void
    {
        static::creating(function (Presupuesto $p) {

            $p->fecha ??= now()->toDateString();

            $cliente = Cliente::find($p->cliente_id);
            if ($cliente) {
                $p->nombre_cliente ??= $cliente->nombre . ' ' . $cliente->apellidos;
                $p->nif ??= $cliente->nif;
                $p->direccion ??= $cliente->direccion;
                $p->telefono ??= $cliente->telefono;
            }

        });
    }
}
