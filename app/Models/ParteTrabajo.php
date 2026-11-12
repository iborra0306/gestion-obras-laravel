<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParteTrabajo extends Model
{
    use HasFactory;

    protected $table = 'partes_trabajo';

    protected $fillable = ['obra_id', 'fecha', 'descripcion', 'user_id'];

    protected function casts(): array
    {
        return [
            'fecha' => 'date:Y-m-d',
        ];
    }
}
