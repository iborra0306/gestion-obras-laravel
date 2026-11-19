<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trabajador extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'TRB';

    protected $table = 'trabajadores';

    protected $fillable = ['tipo', 'nombre', 'apellido', 'telefono', 'coste_hora_estandar'];

    protected function casts(): array
    {
        return [
            'coste_hora_estandar' => 'float',
        ];
    }

    protected $attributes = [
        'coste_hora_estandar' => 20,
    ];

    protected function nombreCompleto(): Attribute
    {
        return Attribute::get(fn () => trim($this->nombre . ' ' . $this->apellido));
    }

    public function lineasTrabajo(): HasMany
    {
        return $this->hasMany(LineaParteTrabajo::class);
    }

    public function faltas(): HasMany
    {
        return $this->hasMany(Falta::class);
    }

    public function obrasParticipadas(): Builder
    {
        return Obra::whereHas('partesTrabajo.lineas', fn ($q) => $q->where('trabajador_id', $this->id));
    }
}
