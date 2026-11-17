<x-layout titulo="Nuevo Proveedor">
    <x-cabecera titulo="Nuevo Proveedor"/>

    <x-formulario :action="route('proveedores.store')" metodo="POST" :cancelar="route('proveedores.index')">
        @include('proveedores._formulario')
    </x-formulario>
</x-layout>
