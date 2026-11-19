<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'CLI';

    protected $table = 'clientes';

    protected $fillable = ['nombre', 'apellidos', 'nif', 'direccion', 'cod_postal', 'telefono'];

    protected function nombreCompleto(): Attribute
    {
        return Attribute::get(fn () => trim($this->nombre . ' ' . $this->apellidos));
    }

    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class);
    }

    public function obras(): HasMany
    {
        return $this->hasMany(Obra::class);
    }

    public function ingresos(): HasMany
    {
        return $this->hasMany(Ingreso::class);
    }
}
