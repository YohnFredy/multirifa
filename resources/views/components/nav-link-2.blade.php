@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-rojo-500  font-bold leading-5 text-azul-600 focus:outline-none focus:border-azul-500 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 text-gray-700 hover:text-azul-500 hover:border-azul-600 focus:outline-none focus:text-rojo-500 focus:border-azul-500 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> 