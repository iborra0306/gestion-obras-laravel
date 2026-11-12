<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineaPresupuesto extends Model
{
    use HasFactory;

    protected $table = 'lineas_presupuesto';
    
    protected $fillable = ['presupuesto_id', 'descripcion', 'uds', 'precio'];
}
