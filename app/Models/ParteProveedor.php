<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParteProveedor extends Model
{
    use HasFactory;

    protected $table = 'partes_proveedor';

    protected $fillable = ['obra_id', 'proveedor_id', 'fecha', 'descripcion', 'documento', 'importe', 'estado_pago', 'user_id'];
}
