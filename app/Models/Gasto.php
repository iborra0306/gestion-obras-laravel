<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\TieneCodigo;

class Gasto extends Model
{
    use TieneCodigo;

    public const PREFIJO = 'GAS';

    protected $table = 'gastos';

    protected $fillable = ['obra_id', 'presupuesto_id', 'direccion_obra', 'inicio_obra', 'fin_obra', 'solicitud_obra', 'mandante', 'gestion_licencia', 'pago_icio'];

    protected function casts(): array
    {
        return [
            'inicio_obra'      => 'date:Y-m-d',
            'fin_obra'         => 'date:Y-m-d',
            'solicitud_obra'   => 'date:Y-m-d',
            'mandante'         => 'boolean',
            'gestion_licencia' => 'boolean',
            'pago_icio'        => 'boolean',
        ];
    }
}
