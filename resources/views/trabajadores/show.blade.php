<x-layout :titulo="$trabajador['nombre']">
    <h1 class="mb-4 text-2xl font-semibold">{{ $trabajador['nombre'] }} {{ $trabajador['apellido'] }}</h1>

    <dl class="grid grid-cols-[10rem_1fr] gap-2 bg-white p-4 shadow">
        <dt class="font-medium">Nombre</dt>        <dd>{{ $trabajador['nombre'] }} {{ $trabajador['apellido'] }}</dd>
        <dt class="font-medium">Tipo</dt>  <dd>{{ $trabajador['tipo'] }}</dd>
        <dt class="font-medium">Telefono</dt>  <dd>{{ $trabajador['telefono'] }}</dd>
        <dt class="font-medium">Coste hora estandar</dt>   <dd>{{ $trabajador['coste_hora_estandar'] }}</dd>
    </dl>

    <div class="mt-4 flex gap-4">
        <a href="{{ route('trabajadores.edit', $id) }}" class="underline">Modificar</a>
        <a href="{{ route('trabajadores.index') }}" class="underline">Volver al listado</a>
    </div>
</x-layout>
