<x-layout titulo="Nuevo especialista">
    <x-cabecera titulo="Nuevo especialista"/>

    <x-formulario :action="route('especialistas.store')" metodo="POST" :cancelar="route('especialistas.index')">
        @include('especialistas._formulario')
    </x-formulario>
</x-layout>