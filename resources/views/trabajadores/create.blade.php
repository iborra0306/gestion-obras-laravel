<x-layout titulo="Nuevo trabajador">
    <x-cabecera titulo="Nuevo trabajador"/>

    <x-formulario :action="route('trabajadores.store')" metodo="POST" :cancelar="route('trabajadores.index')">
        @include('trabajadores._formulario')
    </x-formulario>
</x-layout>
