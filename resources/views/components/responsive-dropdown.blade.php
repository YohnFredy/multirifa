@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-azul-500 text-base font-medium text-azul-500 bg-azul-50 focus:outline-none focus:text-azul-600 focus:bg-azul-50 focus:border-azul-600 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-700 hover:text-azul-600 hover:bg-gray-50 hover:border-rojo-500 focus:outline-none focus:text-azul-500 focus:bg-gray-50 focus:border-rojo-500 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>