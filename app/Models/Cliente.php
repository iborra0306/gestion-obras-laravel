<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Cliente extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'CLI';

    protected $table = 'clientes';

    protected $fillable = ['nombre', 'apellidos', 'nif', 'direccion', 'cod_postal', 'telefono'];
}
