@php
    $cliente ??= null;

    $campos = [
        'nombre'     => ['Nombre', $cliente?->nombre],
        'apellidos'  => ['Apellidos', $cliente?->apellidos],
        'nif'        => ['NIF', $cliente?->nif],
        'direccion'  => ['Dirección', $cliente?->direccion],
        'cod_postal' => ['Código postal', $cliente?->codPostal],
        'telefono'   => ['Teléfono', $cliente?->telefono],
    ];
@endphp

@foreach ($campos as $name => [$etiqueta, $valor])
    <x-campo :name="$name" :etiqueta="$etiqueta" :valor="$valor" />
@endforeach