<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Proveedor extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'PROV';

    protected $table = 'proveedores';

    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'tipo', 'referencia', 'documento', 'num_documento'];
}
