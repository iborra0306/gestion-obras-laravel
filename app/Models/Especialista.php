<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Especialista extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'ESP';

    protected $table = 'especialistas';

    protected $fillable = ['tipo', 'referencia', 'comunicacion_parte', 'nombre', 'notas', 'telefono', 'correo'];
}
