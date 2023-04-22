@props(['bg' => 'azul-500', 'bg_hover'=>'azul-600'])


<a {{ $attributes->merge(['class' => "text-center px-4 py-2 bg-$bg border border-transparent rounded-md font-semibold text-white text-sm uppercase tracking-widest hover:bg-$bg_hover active:bg-rojo-500 focus:outline-none focus:border-$bg focus:ring focus:ring-azul-50 disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</a> 



