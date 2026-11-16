<x-layout titulo="Trabajador">
    <x-cabecera :titulo="$id" subtitulo="Ficha de trabajador">
        <x-boton :href="route('trabajadores.edit', $id)">Editar</x-boton>
        <x-boton :href="route('trabajadores.index')">Volver</x-boton>
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="Nombre">{{ $trabajador['nombre'] }}</x-dato>
            <x-dato etiqueta="Apellido">{{ $trabajador['apellido'] }}</x-dato>
            <x-dato etiqueta="Tipo">{{ $trabajador['tipo'] }}</x-dato>
            <x-dato etiqueta="Telefono">{{ $trabajador['telefono'] }}</x-dato>
            <x-dato etiqueta="Coste Hora Estandar">{{ number_format($trabajador['coste_hora_estandar'], 2, ',', '.') }} €</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>