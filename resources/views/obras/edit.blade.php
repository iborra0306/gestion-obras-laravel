<x-layout titulo="Modificar obra">
    <h1 class="mb-4 text-2xl font-semibold">Modificar obra: {{ $obra['codigo'] }}</h1>

    <form method="POST" action="{{ route('obras.update', $id) }}">
        @csrf
        @method('PUT')
        @include('obras._formulario')
        <button type="submit" class="mt-4 rounded bg-slate-800 px-3 py-1.5 text-white">Guardar cambios</button>
    </form>
</x-layout>
