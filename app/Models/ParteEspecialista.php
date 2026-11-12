<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParteEspecialista extends Model
{
    use HasFactory;

    protected $table = 'partes_especialista';

    protected $fillable = ['obra_id', 'especialista_id', 'fecha', 'descripcion', 'documento', 'importe', 'estado_pago', 'user_id'];

    protected function casts(): array
    {
        return [
            'fecha'   => 'date:Y-m-d',
            'importe' => 'float',
        ];
    }
}
