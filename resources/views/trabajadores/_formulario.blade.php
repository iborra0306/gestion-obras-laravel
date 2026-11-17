@php
    $trabajador ??= null;

    $campos = [
        'nombre' => ['Nombre', $trabajador?->nombre],
        'apellido' => ['Apellido', $trabajador?->apellido],
        'tipo'  => ['Tipo', $trabajador?->tipo],
        'telefono'  => ['Telefono', $trabajador?->telefono],
        'coste_hora_estandar'  => ['Coste Hora Estandar', $trabajador?->coste_hora_estandar],
    ];
@endphp

@foreach ($campos as $name => [$etiqueta, $valor])
    <x-campo :name="$name" :etiqueta="$etiqueta" :valor="$valor" />
@endforeach