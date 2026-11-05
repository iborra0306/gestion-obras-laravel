<x-layout titulo="Modificar trabajador">
    <h1 class="mb-4 text-2xl font-semibold">Modificar trabajador: {{ $trabajdor['nombre'] }} {{ $cliente['apellidos'] }}</h1>
    
    <form method="POST" action="{{ route('trabajadores.update', $id) }}">
        @csrf
        @method('PUT')
        @include('trabajadores._formulario')
        <button type="submit" class="mt-4 rounded bg-slate-800 px-3 py-1.5 text-white">Guardar cambios</button>
    </form>
    {{-- El formulario se completa en el apartado 5.6 --}}
</x-layout>
