<x-layout titulo="Editar especialista">
    <x-cabecera :titulo="'Editar ' . $especialista->codigo" />

    <x-formulario :action="route('especialistas.update', $especialista->id)" metodo="PUT" boton="Guardar cambios" :cancelar="route('especialistas.show', $especialista->id)">
        @include('especialistas._formulario')
    </x-formulario>
</x-layout>
