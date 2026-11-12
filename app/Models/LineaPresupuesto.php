<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LineaPresupuesto extends Model
{
    use HasFactory;

    protected $table = 'lineas_presupuesto';
    
    protected $fillable = ['presupuesto_id', 'descripcion', 'uds', 'precio'];

    protected function casts(): array
    {
        return [
            'uds' => 'integer',
        ];
    }

    protected function totalLinea(): Attribute
    {
        return Attribute::get(fn () => $this->uds * $this->precio);
    }
}
