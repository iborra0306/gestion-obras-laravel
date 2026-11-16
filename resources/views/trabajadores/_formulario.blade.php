@php
    $trabajador ??= null;

    $campos = [
        'nombre' => ['Nombre', $trabajador['nombre'] ?? null],
        'apellido' => ['Apellido', $trabajador['apellido'] ?? null],
        'tipo'  => ['Tipo', $trabajador['tipo'] ?? null],
        'telefono'  => ['Telefono', $trabajador['telefono'] ?? null],
        'coste_hora_estandar'  => ['Coste Hora Estandar', $trabajador['coste_hora_estandar'] ?? null],
    ];
@endphp

@foreach ($campos as $name => [$etiqueta, $valor])
    <x-campo :name="$name" :etiqueta="$etiqueta" :valor="$valor" />
@endforeach