<x-layout titulo="Cliente">
    <x-cabecera :titulo="$cliente->nombre_completo" subtitulo="Ficha de cliente">
        <x-boton :href="route('clientes.edit', $cliente->id)">Editar</x-boton>
        <x-borrar :action="route('clientes.destroy', $cliente->id)" pregunta="¿Borrar este cliente?" texto="Borrar" />
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="Codigo">{{ $cliente->codigo }}</x-dato>
            <x-dato etiqueta="NIF">{{ $cliente->nif }}</x-dato>
            <x-dato etiqueta="Dirección">{{ $cliente->direccion }}</x-dato>
            <x-dato etiqueta="Código postal">{{ $cliente->codPostal }}</x-dato>
            <x-dato etiqueta="Teléfono">{{ $cliente->telefono }}</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>