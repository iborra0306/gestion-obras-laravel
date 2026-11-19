<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialista extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'ESP';

    protected $table = 'especialistas';

    protected $fillable = ['tipo', 'referencia', 'comunicacion_parte', 'nombre', 'notas', 'telefono', 'correo'];

    public function partes(): HasMany
    {
        return $this->hasMany(ParteEspecialista::class, 'especialista_id');
    }

    public function presupuestos(): BelongsToMany
    {
        return $this->belongsToMany(Presupuesto::class, 'especialista_presupuesto', 'especialista_id', 'presupuesto_id');
    }

    public function obrasParticipadas(): Builder
    {
        return Obra::whereHas('partesEspecialista', fn ($q) => $q->where('especialista_id', $this->id));
    }
}
