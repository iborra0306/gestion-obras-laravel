<x-layout titulo="Clientes">
    <x-cabecera titulo="Clientes" subtitulo="Personas y empresas que encargan obras">
        <x-boton :href="route('clientes.create')">Nuevo cliente</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Código', 'Nombre', 'NIF', 'Teléfono']" vacio="No hay clientes.">
        @foreach ($clientes as $cliente)
            <tr>
                <td><a href="{{ route('clientes.show', $cliente->id) }}">{{ $cliente->codigo }}</a></td>
                <td>{{ $cliente->nombre_completo }}</td>
                <td>{{ $cliente->nif }}</td>
                <td>{{ $cliente->telefono }}</td>
            </tr>
        @endforeach

        <x-slot:pie>{{ $clientes->links() }}</x-slot:pie>
    </x-tabla>
</x-layout>