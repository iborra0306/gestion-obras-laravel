<x-layout titulo="Cliente">
    <x-cabecera :titulo="$cliente->nombreCompleto()" subtitulo="Ficha de cliente">
        <x-boton :href="route('clientes.edit', $cliente->id)">Editar</x-boton>
        <x-boton :href="route('clientes.index')" variante="secundario">Volver</x-boton>
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="NIF">{{ $cliente->nif }}</x-dato>
            <x-dato etiqueta="Dirección">{{ $cliente->direccion }}</x-dato>
            <x-dato etiqueta="Código postal">{{ $cliente->codPostal }}</x-dato>
            <x-dato etiqueta="Teléfono">{{ $cliente->telefono }}</x-dato>
            <x-dato etiqueta="Creado por">{{ $cliente->creadoPor }}</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>