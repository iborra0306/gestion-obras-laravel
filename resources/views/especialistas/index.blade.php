<x-layout titulo="Especialistas">
    <x-cabecera titulo="Especialistas" subtitulo="Especialistas">
        <x-boton :href="route('especialistas.create')">Nuevo Especialista</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Código', 'Nombre', 'Tipo', 'Teléfono']">
        @foreach ($especialistas as $especialista)
            <tr>
                <td><a href="{{ route('especialistas.show', $especialista->id) }}">{{ $especialista->codigo }}</a></td>
                <td>{{ $especialista->nombre }}</td>
                <td>{{ $especialista->tipo }}</td>
                <td>{{ $especialista->telefono }}</td>
            </tr>
        @endforeach

        <x-slot:pie>{{ $especialistas->links() }}</x-slot:pie>
    </x-tabla>
</x-layout>
    