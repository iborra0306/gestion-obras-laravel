@use('App\Support\Formato')

<x-layout titulo="Trabajadores">
    <x-cabecera titulo="Trabajadores" subtitulo="Trabajadores">
        <x-boton :href="route('trabajadores.create')">Nuevo trabajador</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Código', 'Nombre', 'Apellido', 'Tipo', 'Telefono', 'Tarifa']" vacio="No hay trabajadores.">
        @foreach ($trabajadores as $trabajador)
            <tr>
                <td><a href="{{ route('trabajadores.show', $trabajador->id) }}">{{ $trabajador->codigo }}</a></td>
                <td>{{ $trabajador->nombre }}</td>
                <td>{{ $trabajador->apellido }}</td>
                <td>{{ $trabajador->tipo }}</td>
                <td>{{ $trabajador->telefono }}</td>
                <td>{{ Formato::n($trabajador->coste_hora_estandar) }} €</td>
            </tr>
        @endforeach

        <x-slot:pie>{{ $trabajadores->links() }}</x-slot:pie>
    </x-tabla>
</x-layout>