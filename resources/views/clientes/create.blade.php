<x-layout titulo="Nuevo cliente">
    <x-cabecera titulo="Nuevo cliente" />

    <x-formulario :action="route('clientes.store')" metodo="POST" boton="Guardar" :cancelar="route('clientes.index')">
        @include('clientes._formulario')
    </x-formulario>
</x-layout>