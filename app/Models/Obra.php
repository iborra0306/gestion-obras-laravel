<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\TieneCodigo;

class Obra extends Model
{
    use TieneCodigo, HasFactory;

    public const PREFIJO = 'OBR';

    protected $table = 'obras';

    protected $fillable = ['descripcion', 'cliente_id'];
}
