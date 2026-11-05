<x-layout titulo="Nuevo trabajador">
    <h1 class="mb-4 text-2xl font-semibold">Nuevo Trabajador</h1>

    <form method="POST" action="{{ route('trabajadores.store') }}">
        @csrf
        @include('trabajadores._formulario', ['trabajador' => null])
        <button type="submit" class="mt-4 rounded bg-slate-800 px-3 py-1.5 text-white">Guardar</button>
    </form>
    {{-- El formulario se completa en el apartado 5.6 --}}
</x-layout>
