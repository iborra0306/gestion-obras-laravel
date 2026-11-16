<x-layout titulo="Editar trabajador">
    <x-cabecera :titulo="'Editar ' . $id" />

    <x-formulario :action="route('trabajadores.update', $id)" metodo="PUT" boton="Guardar cambios" :cancelar="route('trabajadores.show', $id)">
        @include('trabajadores._formulario')
    </x-formulario>
</x-layout>