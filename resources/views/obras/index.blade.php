<x-layout titulo="Obras">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Obras</h1>
        <a href="{{ route('obras.create') }}" class="rounded bg-slate-800 px-3 py-1.5 text-white">Nueva obra</a>
    </div>

    <table class="w-full bg-white text-left text-sm shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2">Codigo</th>
                <th class="px-3 py-2">Descripcion</th>
                <th class="px-3 py-2">Cliente_id</th>
                <th class="px-3 py-2">Total</th>
                <th class="px-3 py-2">Cobrado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($obras as $id => $obra)
                <tr class="border-t">
                    <td class="px-3 py-2">{{ $obra['codigo'] }}</td>
                    <td class="px-3 py-2">{{ $obra['descripcion'] }}</td>
                    <td class="px-3 py-2">{{ $obra['cliente_id'] }}</td>
                    <td class="px-3 py-2">{{ number_format($obra['total'], 2, ',', '.') . ' €' }}</td>
                    <td class="px-3 py-2">
                        @if ($obra['cobrado'] <= 0)
                            Pendiente
                        @elseif ($obra['cobrado'] < $obra['total'])
                            Parcial
                        @else
                            Pagado
                        @endif
                    </td>
                    <td class="px-3 py-2 text-right">
                        <a href="{{ route('obras.show', $id) }}" class="underline">Ver</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-3 py-2">No hay obras.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
