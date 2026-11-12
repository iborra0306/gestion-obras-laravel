<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Trabajador extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'TRB';

    protected $table = 'trabajadores';

    protected $fillable = ['tipo', 'nombre', 'apellido', 'telefono', 'coste_hora_estandar'];
}
