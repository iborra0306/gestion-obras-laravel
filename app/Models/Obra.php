<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Obra extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'OBR';

    protected $table = 'obras';

    protected $fillable = ['descripcion', 'cliente_id'];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function gasto(): HasOne
    {
        return $this->hasOne(Gasto::class);
    }

    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class);
    }

    public function ingresos(): HasMany
    {
        return $this->hasMany(Ingreso::class);
    }

    public function partesTrabajo(): HasMany
    {
        return $this->hasMany(ParteTrabajo::class);
    }

    public function partesProveedor(): HasMany
    {
        return $this->hasMany(ParteProveedor::class);
    }

    public function partesEspecialista(): HasMany
    {
        return $this->hasMany(ParteEspecialista::class);
    }

    public function lineasTrabajo(): HasManyThrough
    {
        return $this->hasManyThrough(LineaParteTrabajo::class, ParteTrabajo::class);
    }

    public function trabajadoresParticipantes(): Builder
    {
        return Trabajador::whereHas('lineasTrabajo.parte', fn ($q) => $q->where('obra_id', $this->id));
    }

    public function lineasProveedor(): HasManyThrough
    {
        return $this->hasManyThrough(ParteProveedor::class, Proveedor::class);
    }

    public function proveedoresParticipantes(): Builder
    {
        return Proveedor::whereHas('partes', fn ($q) => $q->where('obra_id', $this->id));
    }

    public function lineasEspecialista(): HasManyThrough
    {
        return $this->hasManyThrough(ParteEspecialista::class, Especialista::class);
    }

    public function especialistasParticipantes(): Builder
    {
        return Especialista::whereHas('partes', fn ($q) => $q->where('obra_id', $this->id));
    }
}
