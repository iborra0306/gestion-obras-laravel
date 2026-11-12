<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Trabajador extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'TRB';

    protected $table = 'trabajadores';

    protected $fillable = ['tipo', 'nombre', 'apellido', 'telefono', 'coste_hora_estandar'];

    protected $attributes = [
        'coste_hora_estandar' => 20,
    ];

    protected function nombre_completo(): Attribute
    {
        return Attribute::get(fn () => trim($this->nombre . ' ' . $this->apellidos));
    }
}
