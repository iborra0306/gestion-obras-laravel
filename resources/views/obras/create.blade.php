<x-layout titulo="Nueva obra">
    <x-cabecera titulo="Nueva obra" />

    <x-formulario :action="route('obras.store')" metodo="POST" boton="Guardar" :cancelar="route('obras.index')">
        @include('obras._formulario')
    </x-formulario>
</x-layout>
