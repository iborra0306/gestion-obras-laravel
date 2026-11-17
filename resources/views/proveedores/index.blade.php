@use('App\Support\Formato')

<x-layout titulo="Proveedores">
    <x-cabecera titulo="Proveedores" subtitulo="Empresas que nos suministran">
        <x-boton :href="route('proveedores.create')">Nuevo proveedor</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Código', 'Nombre', 'Tipo', 'Total']" vacio="No hay proveedores.">
        @foreach ($proveedores as $proveedor)
            <tr>
                <td><a href="{{ route('proveedores.show', $proveedor->id) }}">{{ $proveedor->codigo }}</a></td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->tipo }}</td>
                <td>{{ Formato::n(0) }} €</td>
            </tr>
        @endforeach

        <x-slot:pie>{{ $proveedores->links() }}</x-slot:pie>
    </x-tabla>
</x-layout>