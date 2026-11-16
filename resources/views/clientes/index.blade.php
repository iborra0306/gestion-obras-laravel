<x-layout titulo="Clientes">
    <x-cabecera titulo="Clientes" subtitulo="Personas y empresas que encargan obras">
        <x-boton :href="route('clientes.create')">Nuevo cliente</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Nombre', 'NIF', 'Teléfono', '']" vacio="No hay clientes.">
        @foreach ($clientes as $cliente)
            <tr>
                <td><a href="{{ route('clientes.show', $cliente->id) }}">{{ $cliente->nombreCompleto() }}</a></td>
                <td>{{ $cliente->nif }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td class="text-right"><a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a></td>
            </tr>
        @endforeach
    </x-tabla>
</x-layout>