@props(['tipo' => 'exito'])

@php
    $clases = $tipo === 'error'
        ? 'bg-red-100 border-red-400 text-red-700'
        : 'bg-green-100 border-green-400 text-green-700';
@endphp

<div {{ $attributes->merge(['class' => "border px-4 py-3 rounded mb-4 {$clases}", 'role' => 'alert']) }}>
    {{ $slot }}
</div>