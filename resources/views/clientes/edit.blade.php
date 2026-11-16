<x-layout titulo="Editar cliente">
    <x-cabecera :titulo="'Editar ' . $cliente->nombreCompleto()" />

    <x-formulario :action="route('clientes.update', $cliente->id)" metodo="PUT" boton="Guardar cambios" :cancelar="route('clientes.show', $cliente->id)">
        @include('clientes._formulario')
    </x-formulario>
</x-layout>