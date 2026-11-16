<x-layout titulo="Obras">
    <x-cabecera titulo="Obras" subtitulo="Trabajos en curso y terminados">
        <x-boton :href="route('obras.create')">Nueva obra</x-boton>
    </x-cabecera>

    <x-tabla :columnas="['Código', 'Descripción', 'Total', 'Cobrado', 'Estado', '']" vacio="No hay obras.">
        @foreach ($obras as $id => $obra)
            <tr>
                <td><a href="{{ route('obras.show', $id) }}">{{ $obra['codigo'] }}</a></td>
                <td>{{ $obra['descripcion'] }}</td>
                <td>{{ number_format($obra['total'], 2, ',', '.') }} €</td>
                <td>{{ number_format($obra['cobrado'], 2, ',', '.') }} €</td>
                <td>
                    @if ($obra['cobrado'] <= 0)
                        Pendiente
                    @elseif ($obra['cobrado'] < $obra['total'])
                        Parcial
                    @else
                        Pagado
                    @endif
                </td>
                <td class="text-right"><a href="{{ route('obras.edit', $id) }}">Editar</a></td>
            </tr>
        @endforeach
    </x-tabla>
</x-layout>