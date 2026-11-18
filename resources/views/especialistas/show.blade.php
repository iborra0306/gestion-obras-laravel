<x-layout titulo="Especialista">
    <x-cabecera :titulo="$especialista->codigo" subtitulo="Ficha de especialista">
        <x-boton :href="route('especialistas.edit', $especialista->id)">Editar</x-boton>
        <x-borrar :action="route('especialistas.destroy', $especialista->id)" preguntar="¿Borrar este trabajador?" texto="Borrar" />
    </x-cabecera>

    <x-tarjeta titulo="Datos">
        <dl>
            <x-dato etiqueta="Codigo">{{ $especialista->codigo }}</x-dato>
            <x-dato etiqueta="Nombre">{{ $especialista->nombre }}</x-dato>
            <x-dato etiqueta="Tipo">{{ $especialista->tipo }}</x-dato>
            <x-dato etiqueta="Referencia">{{ $especialista->referencia }}</x-dato>
            <x-dato etiqueta="Parte comunicacion">{{ $especialista->comunicacion_parte }}</x-dato>
            <x-dato etiqueta="Teléfono">{{ $especialista->telefono }}</x-dato>
            <x-dato etiqueta="Notas">{{ $especialista->notas }}</x-dato>
            <x-dato etiqueta="Correo">{{ $especialista->correo }}</x-dato>
        </dl>
    </x-tarjeta>
</x-layout>
