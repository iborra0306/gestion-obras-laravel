<x-layout titulo="Trabajadores">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Trabajadores</h1>
        <a href="{{ route('trabajadores.create') }}" class="rounded bg-slate-800 px-3 py-1.5 text-white">Nuevo trabajador</a>
    </div>

    <table class="w-full bg-white text-left text-sm shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2">Nombre y apellido</th>
                <th class="px-3 py-2">Tipo</th>
                <th class="px-3 py-2">Telefono</th>
                <th class="px-3 py-2">Coste hora estandar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trabajadores as $id => $trabajador)
                <tr class="border-t">
                    <td class="px-3 py-2">{{ $trabajador['nombre'] }} {{ $trabajador['apellido'] }}</td>
                    <td class="px-3 py-2">{{ $trabajador['tipo'] }}</td>
                    <td class="px-3 py-2">{{ $trabajador['telefono'] }}</td>
                    <td class="px-3 py-2">{{ $trabajador['coste_hora_estandar'] }}</td>
                    <td class="px-3 py-2 text-right">
                        <a href="{{ route('trabajadores.show', $id) }}" class="underline">Ver</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-3 py-2">No hay trabajadores.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
