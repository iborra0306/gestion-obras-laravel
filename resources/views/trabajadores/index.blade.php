<x-layout titulo="Trabajadores">
    <x-cabecera titulo="Trabajadores" subtitulo="Trabajadores">
        <x-boton :href="route('trabajadores.create')">Nuevo trabajador</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Código', 'Nombre', 'Apellido', 'Tipo', 'Telefono', 'Coste Hora Estandar', '']" vacio="No hay obras.">
        @foreach ($trabajadores as $id => $trabajador)
            <tr>
                <td><a href="{{ route('trabajadores.show', $id) }}">{{ $id }}</a></td>
                <td>{{ $trabajador['nombre'] }}</td>
                <td>{{ $trabajador['apellido'] }}</td>
                <td>{{ $trabajador['tipo'] }}</td>
                <td>{{ $trabajador['telefono'] }}</td>
                <td>{{ number_format($trabajador['coste_hora_estandar'], 2, ',', '.') }} €</td>
                <td class="text-right"><a href="{{ route('trabajadores.edit', $id) }}">Editar</a></td>
            </tr>
        @endforeach
    </x-tabla>
</x-layout>