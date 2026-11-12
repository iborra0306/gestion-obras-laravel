<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Falta extends Model
{
    use HasFactory;

    protected $table = 'faltas';

    protected $fillable = ['trabajador_id', 'fecha_inicio', 'fecha_fin', 'tipo', 'motivo', 'user_id'];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date:Y-m-d',
            'fecha_fin'    => 'date:Y-m-d',
        ];
    }

    protected $attributes = [
        'tipo' => 'vacaciones',
    ];

    protected function dias(): Attribute
    {
        return Attribute::get(
            fn () => (int) $this->fecha_inicio->diffInDays($this->fecha_fin) + 1
        );
    }
}
