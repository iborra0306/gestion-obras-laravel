<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Falta extends Model
{
    use HasFactory;

    protected $table = 'faltas';

    protected $fillable = ['trabajador_id', 'fecha_inicio', 'fecha_fin', 'tipo', 'motivo', 'user_id'];
}
