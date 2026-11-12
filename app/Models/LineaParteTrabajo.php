<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineaParteTrabajo extends Model
{
    use HasFactory;

    protected $table = 'lineas_parte_trabajo';

    protected $fillable = ['parte_trabajo_id', 'trabajador_id', 'horas', 'coste_hora'];
}
