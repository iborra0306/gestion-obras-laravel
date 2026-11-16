<x-layout titulo="Obra">
    <x-cabecera :titulo="$obra['codigo']" subtitulo="Ficha de obra">
        <x-boton :href="route('obras.edit', $id)">Editar</x-boton>
        <x-boton :href="route('obras.index')">Volver</x-boton>
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="Descripcion">{{ $obra['descripcion'] }}</x-dato>
            <x-dato etiqueta="Cliente">{{ $cliente }}</x-dato>
            <x-dato etiqueta="Total">{{ number_format($obra['total'], 2, ',', '.') }} €</x-dato>
            <x-dato etiqueta="Cobrado">{{ number_format($obra['cobrado'], 2, ',', '.') }} €</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>