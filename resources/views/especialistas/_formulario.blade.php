@php
    $especialista ??= null;

    $campos = [
        'nombre' => ['Nombre', $especialista?->nombre],
        'tipo' => ['Tipo', $especialista?->tipo],
        'referencia' => ['Referencia', $especialista?->referencia],
        'comunicacion_parte' => ['Parte comunicacion', $especialista?->comunicacion_parte],
        'telefono' => ['Teléfono', $especialista?->telefono],
        'notas' => ['Notas', $especialista?->notas],
        'correo' => ['Correo', $especialista?->correo],
    ];
@endphp

@foreach ($campos as $name => [$etiqueta, $valor])
    <x-campo :name="$name" :etiqueta="$etiqueta" :valor="$valor" />    
@endforeach
