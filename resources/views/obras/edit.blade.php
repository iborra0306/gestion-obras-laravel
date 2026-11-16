<x-layout titulo="Editar obra">
    <x-cabecera :titulo="'Editar ' . $obra['codigo']" />

    <x-formulario :action="route('obras.update', $id)" metodo="PUT" boton="Guardar cambios" :cancelar="route('obras.show', $id)">
        @include('obras._formulario')
    </x-formulario>
</x-layout>