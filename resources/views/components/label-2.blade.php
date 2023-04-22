@props(['for'=> 'nombre'])

<label for="{{$for}}"
    class="peer-focus:font-medium absolute text-base text-azul-600 duration-300 transform -translate-y-6 scale-95 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-azul-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">{{$slot}}</label>
