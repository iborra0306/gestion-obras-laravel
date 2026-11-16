@php
    $obra ??= null;

    $campos = [
        'codigo' => ['Código', $obra['codigo'] ?? null],
        'descripcion' => ['Descripcion', $obra['descripcion'] ?? null],
        'cliente_id'  => ['Cliente', $obra['cliente_id'] ?? null],
        'total'  => ['Total', $obra['total'] ?? null],
        'cobrado'  => ['Cobrado', $obra['cobrado'] ?? null],
    ];
@endphp

@foreach ($campos as $name => [$etiqueta, $valor])
    <x-campo :name="$name" :etiqueta="$etiqueta" :valor="$valor" />
@endforeach