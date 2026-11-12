<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LineaParteTrabajo extends Model
{
    use HasFactory;

    protected $table = 'lineas_parte_trabajo';

    protected $fillable = ['parte_trabajo_id', 'trabajador_id', 'horas', 'coste_hora'];

    protected function casts(): array
    {
        return [
            'horas' => 'float',
        ];
    }

    protected function coste_subtotal(): Attribute
    {
        return Attribute::get(fn () => $this->horas * $this->coste_hora);
    }
}
