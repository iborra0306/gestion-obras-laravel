<x-layout :titulo="$obra['codigo']">
    <h1 class="mb-4 text-2xl font-semibold">{{ $obra['codigo'] }}</h1>

    <dl class="grid grid-cols-[10rem_1fr] gap-2 bg-white p-4 shadow">
        <dt class="font-medium">Codigo</dt>        <dd>{{ $obra['codigo'] }}</dd>
        <dt class="font-medium">Descripcion</dt>  <dd>{{ $obra['descripcion'] }}</dd>
        <dt class="font-medium">Cliente</dt>  <dd>{{ $cliente }}</dd>
        <dt class="font-medium">Total</dt>   <dd>{{ number_format($obra['total'], 2, ',', '.') . ' €' }}</dd>
        <dt class="font-medium">Cobrado</dt>   <dd>{{ number_format($obra['cobrado'], 2, ',', '.') . ' €' }}</dd>
        <dt class="font-medium">Estado de pago</dt>
            <dd>
                @if ($obra['cobrado'] <= 0)
                    Pendiente
                @elseif ($obra['cobrado'] < $obra['total'])
                    Parcial
                @else
                    Pagado
                @endif
            </dd>
    </dl>

    <div class="mt-4 flex gap-4">
        <a href="{{ route('obras.edit', $id) }}" class="underline">Modificar</a>
        <a href="{{ route('obras.index') }}" class="underline">Volver al listado</a>
    </div>
</x-layout>