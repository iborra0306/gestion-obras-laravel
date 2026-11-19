<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParteProveedor extends Model
{
    use HasFactory;

    protected $table = 'partes_proveedor';

    protected $fillable = ['obra_id', 'proveedor_id', 'fecha', 'descripcion', 'documento', 'importe', 'estado_pago', 'user_id'];

    protected function casts(): array
    {
        return [
            'fecha'   => 'date:Y-m-d',
            'importe' => 'float',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (ParteProveedor $p) {

            $p->fecha ??= now()->toDateString();

        });
    }

    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
