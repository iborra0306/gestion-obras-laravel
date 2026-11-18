@php
    $proveedor ??=null;

    $campos = [
        'nombre' => ['Nombre', $proveedor?->nombre],
        'direccion' => ['Direccion', $proveedor?->direccion],
        'telefono' => ['Telefono', $proveedor?->telefono],
        'correo' => ['Correo', $proveedor?->correo],
        'tipo' => ['Tipo', $proveedor?->tipo],
        'referencia' => ['Referencia', $proveedor?->referencia],
        'documento' => ['Documento', $proveedor?->documento],
        'num_documento' => ['Num Documento', $proveedor?->num_documento],
    ];
@endphp

@foreach ($campos as $name => [$etiqueta, $valor])
    <x-campo :name="$name" :etiqueta="$etiqueta" :valor="$valor" />
@endforeach