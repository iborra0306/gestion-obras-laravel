@use('App\Support\Formato')

<x-layout titulo="Trabajador">
    <x-cabecera :titulo="$trabajador->nombre_completo" subtitulo="Ficha de trabajador">
        <x-boton :href="route('trabajadores.edit', $trabajador->id)">Editar</x-boton>
        <x-borrar :action="route('trabajadores.destroy', $trabajador->id)" pregunta="¿Borrar este trabajador?" texto="Borrar" />
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="Codigo">{{ $trabajador->codigo }}</x-dato>
            <x-dato etiqueta="Nombre">{{ $trabajador->nombre }}</x-dato>
            <x-dato etiqueta="Apellido">{{ $trabajador->apellido }}</x-dato>
            <x-dato etiqueta="Tipo">{{ $trabajador->tipo }}</x-dato>
            <x-dato etiqueta="Telefono">{{ $trabajador->telefono }}</x-dato>
            <x-dato etiqueta="Coste Hora Estandar">{{ Formato::n($trabajador->coste_hora_estandar) }} €</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>