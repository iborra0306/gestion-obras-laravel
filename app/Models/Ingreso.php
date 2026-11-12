<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Ingreso extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'ING';

    protected $table = 'ingresos';

    protected $fillable = ['obra_id', 'cliente_id', 'nombre_obra', 'tipo', 'fecha', 'documento', 'num_documento', 'importe'];

    protected function casts(): array
    {
        return [
            'fecha'   => 'date:Y-m-d',
            'importe' => 'float',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Ingreso $i) {

            $i->fecha ??= now()->toDateString();

            $obra = Obra::find($i->obra_id);
            if ($obra) {
                $i->cliente_id  ??= $obra->cliente_id;
                $i->nombre_obra ??= $obra->descripcion;
            }

        });
    }
}
