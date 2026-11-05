{{-- Campos compartidos por create y edit. $cliente es null al crear. --}}
@php($c = $trabajador ?? [])

<div class="grid gap-4 bg-white p-4 shadow sm:grid-cols-2">
    @foreach ([
        'nombre' => 'Nombre',
        'apellido' => 'Apellido',
        'Tipo' => 'Tipo',
        'telefono' => 'Teléfono',
        'coste_hora_estandar' => 'Coste hora estandar'
    ] as $campo => $etiqueta)
        <label class="block">
            <span class="text-sm font-medium">{{ $etiqueta }}</span>
            <input type="text" name="{{ $campo }}" value="{{ old($campo, $c[$campo] ?? '') }}"
                   @class(['mt-1 w-full rounded border px-2 py-1', 'border-red-500' => $errors->has($campo)])>
            @error($campo)
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </label>
    @endforeach
</div>
