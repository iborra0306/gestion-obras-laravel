<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\TieneCodigo;

class Gasto extends Model
{
    public const PREFIJO = 'GAS';

    protected $table = 'gastos';

    protected $fillable = ['obra_id', 'presupuesto_id', 'direccion_obra', 'inicio_obra', 'fin_obra', 'solicitud_obra', 'mandante', 'gestion_licencia', 'pago_icio'];
}
