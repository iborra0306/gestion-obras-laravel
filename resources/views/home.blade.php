<x-layout titulo="Inicio">
    <h1 class="mb-4 text-2xl font-semibold">
        {{ config('gestionobras.empresa.nombre') }}
    </h1>

    <dl class="grid grid-cols-[10rem_1fr] gap-2 bg-white p-4 shadow">
        <dt class="font-medium">Dirección</dt>
        <dd>{{ config('gestionobras.empresa.direccion') }}</dd>

        <dt class="font-medium">Teléfono</dt>
        <dd>{{ config('gestionobras.empresa.telefono') }}</dd>
    </dl>

    <div class="mt-4 flex gap-4">
        <a href="{{ route('clientes.index') }}" class="underline">Clientes</a>
        <a href="{{ route('obras.index') }}" class="underline">Obras</a>
    </div>
</x-layout>