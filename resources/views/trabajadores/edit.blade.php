<x-layout titulo="Editar trabajador">
    <x-cabecera :titulo="'Editar ' . $trabajador->codigo" />

    <x-formulario :action="route('trabajadores.update', $trabajador->id)" metodo="PUT" boton="Guardar cambios" :cancelar="route('trabajadores.show', $trabajador->id)">
        @include('trabajadores._formulario')
    </x-formulario>
</x-layout>