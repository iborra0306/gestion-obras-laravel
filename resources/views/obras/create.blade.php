<x-layout titulo="Nueva obra">
    <h1 class="mb-4 text-2xl font-semibold">Nueva obra</h1>

    <form method="POST" action="{{ route('obras.store') }}">
        @csrf
        @include('obras._formulario', ['obras' => null])
        <button type="submit" class="mt-4 rounded bg-slate-800 px-3 py-1.5 text-white">Guardar</button>
    </form>
</x-layout>
