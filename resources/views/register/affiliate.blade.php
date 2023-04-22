<x-Register-Layout>

   @if ($continuar == true)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class=" grid md:grid-cols-8 my-8">
                <div class=" md:col-start-2 lg:col-start-3 md:col-span-6 lg:col-span-4 rounded-md px-4 py-6 shadow-lg ">
                    <p class="  text-rojo-500 font-semibold text-center mb-2">CREAR CUENTA</p>
                    <div class=" border-b-2 border-azul-500"></div>
                   @livewire('register.affiliate', ['sponsor' => $sponsor, 'side' => $side])
                </div>
            </div>
            <div class=" mb-4 text-xs">
                © 2023 AppPlus Colombia | Todos los derechos reservados.
            </div>
        </div>
    @else
      
            <div class="flex items-center justify-center">
                <p class="text-xl font-semibold text-gray-700 mt-14">Lo sentimos el enlace no
                    existe...</p>
            </div>
        
    @endif 

</x-Register-Layout>
