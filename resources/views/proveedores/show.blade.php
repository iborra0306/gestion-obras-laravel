<x-layout titulo="Proveedor">
    <x-cabecera :titulo="$proveedor->nombre" subtitulo="Ficha de proveedor">
        <x-boton :href="route('proveedores.edit', $proveedor->id)">Editar</x-boton>
        <x-borrar :action="route('proveedores.destroy', $proveedor->id)" pregunta="¿Borrar este proveedor?" texto="Borrar" />
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="Codigo">{{ $proveedor->codigo }}</x-dato>
            <x-dato etiqueta="Nombre">{{ $proveedor->nombre }}</x-dato>
            <x-dato etiqueta="Direccion">{{ $proveedor->direccion }}</x-dato>
            <x-dato etiqueta="Telefono">{{ $proveedor->telefono }}</x-dato>
            <x-dato etiqueta="Correo">{{ $proveedor->correo }}</x-dato>
            <x-dato etiqueta="Tipo">{{ $proveedor->tipo }}</x-dato>
            <x-dato etiqueta="Referencia">{{ $proveedor->referencia }}</x-dato>
            <x-dato etiqueta="Documento">{{ $proveedor->documento }}</x-dato>
            <x-dato etiqueta="Num Documento">{{ $proveedor->num_documento }}</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>