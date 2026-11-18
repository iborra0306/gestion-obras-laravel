<x-layout titulo="Editar proveedor">
    <x-cabecera :titulo="'Editar ' . $proveedor->codigo" />

    <x-formulario :action="route('proveedores.update', $proveedor->id)" metodo="PUT" boton="Guardar cambios" :cancelar="route('proveedores.show', $proveedor->id)">
        @include('proveedores._formulario')
    </x-formulario>
</x-layout>
