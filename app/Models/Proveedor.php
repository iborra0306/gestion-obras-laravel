<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'PROV';

    protected $table = 'proveedores';

    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'tipo', 'referencia', 'documento', 'num_documento'];

    public function partes(): HasMany
    {
        return $this->hasMany(ParteProveedor::class);
    }

    public function presupuestos(): BelongsToMany
    {
        return $this->belongsToMany(Presupuesto::class, 'presupuesto_proveedor', 'proveedor_id', 'presupuesto_id');
    }

    public function obrasParticipadas(): Builder
    {
        return Obra::whereHas('partesProveedor', fn ($q) => $q->where('proveedor_id', $this->id));
    }
}
