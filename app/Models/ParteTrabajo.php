<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected static function booted(): void
    {
        static::creating(function (ParteTrabajo $p) {

            $p->fecha ??= now()->toDateString();

        });
    }

    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lineas(): HasMany
    {
        return $this->hasMany(LineaParteTrabajo::class);
    }
}
