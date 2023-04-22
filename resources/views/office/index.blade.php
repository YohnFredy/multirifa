<x-OfficeLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class=" bg-white shadow-lg w-full mt-8 rounded-lg ">
            <div class=" grid grid-cols-2 gap-4 p-6">
                <div class=" col-span-2  md:col-span-1">
                    <h6 class=" text-azul-600"> <strong>Valor VP:</strong> 10.00</h6>
                </div>
                <div class=" col-span-2 md:col-span-1 text-right">
                    <p class=" text-azul-600"><strong>SALDO DISPONIBLE: </strong>100 US$</p>
                </div>

            </div>
            <div class=" border-b border-gray-400"></div>
            <div class="grid grid-cols-6 divide-y  md:divide-y-0 md:divide-x divide-gray-400 ">
                <div class="col-span-6 md:col-span-2 flex items-center justify-center p-4">
                    <div class="flex items-center justify-end mr-4">
                        <i class="fas fa-users fa-2x text-azul-500"></i>
                    </div>
                    <div>
                        <h6 class=" text-center text-azul-500 font-bold">UNILEVEL</h6>
                        <div class=" flex items-center justify-center">
                            <div class=" mr-4 text-center">
                                <P class="font-bold text-azul-600 ">Directos</P>
                                <p class="text-azul-500 font-semibold">
                                    @if ($quantity)
                                        {{ $quantity->direct }}
                                    @else
                                        0
                                    @endif

                                </p>
                            </div>
                            <div class=" text-center">
                                <p class="font-bold text-azul-600">Total</p>
                                <p class=" text-azul-500 font-semibold">
                                    @if ($quantity)
                                        {{ $quantity->unilevel }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-2 flex items-center justify-center p-4">
                    <div class="flex items-center justify-end mr-4">

                        @if ($quantity)
                            @if ($quantity->left > $quantity->right)
                                <i class="fas fa-balance-scale-left fa-2x text-azul-500"></i>
                            @elseif($quantity->left < $quantity->right)
                                <i class="fas fa-balance-scale-right fa-2x text-text-azul-500">
                                </i>
                            @else
                                <i class="fas fa-balance-scale fa-2x text-text-azul-500"></i>
                            @endif
                        @else
                            <i class="fas fa-balance-scale fa-2x text-text-azul-500"></i>
                        @endif
                    </div>

                    <div>
                        <h6 class=" text-center text-rojo-500 font-bold">BINARIO</h6>
                        <div class=" flex items-center justify-center">

                            <div class=" mr-4 text-center">
                                <P class="font-bold text-azul-600 ">Lado L</P>
                                <p class="text-azul-500 font-semibold">
                                    @if ($quantity)
                                        {{ $quantity->left }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                            <div class=" text-center">
                                <p class="font-bold text-azul-600">Lado R</p>
                                <p class="text-azul-500 font-semibold">
                                    @if ($quantity)
                                        {{ $quantity->right }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-2  flex items-center justify-center p-4">
                    <div class="flex items-center justify-end mr-4">
                        <i class="fab fa-product-hunt fa-2x text-azul-500"></i>
                    </div>
                    <div>
                        <h6 class=" text-center text-amarillo-600 font-bold">PUNTOS</h6>
                        <div class=" flex items-center justify-center">
                            <div class=" mr-4 text-center">
                                <P class="font-bold mr-2 text-azul-600">Lado L</P>
                                <p class="text-azul-500 text-sm font-semibold mr-2">
                                    @if ($points)
                                        {{ $points->pts_left }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                            <div class=" mr-4 text-center">
                                <p class="font-bold text-azul-600">Lado R</p>
                                <p class="text-azul-500 text-sm font-semibold">
                                    @if ($points)
                                        {{ $points->pts_right }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class=" col-span-6 border-b border-gray-400"></div>
            <div class="flex items-center justify-center  p-4 ">
                <p class=" text-center font-bold text-azul-600">El punto de partida de todo logro es el deseo (Napoleon
                    Hill)
                </p>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow-lg w-full p-6 mt-4 ">
            <div class="text-center">
                <p class=" font-bold text-sm text-azul-600 ">Link patrocinador lado izquierdo.</p>
                <div class=" flex items-center justify-center">
                    <p class=" font-bold text-rojo-500 text-sm" id="p1">
                        http://127.0.0.1:8000/{{ $user->usuario }}/l</p>
                    <button class=" ml-6 text-azul-500 hover:text-azul-600" onclick="copiarAlPortapapeles('p1')">
                        <i class="fas fa-copy mr-2"></i>Copiar
                    </button>
                </div>

                <p class=" font-bold mt-4 text-sm text-azul-600 ">Link patrocinador lado derecho.</p>
                <div class=" flex items-center justify-center">
                    <p class=" font-bold text-rojo-500 text-sm" id="p2">
                        http://127.0.0.1:8000/{{ $user->usuario }}/r</p>
                    <button class=" ml-6 text-azul-500 hover:text-azul-600" onclick="copiarAlPortapapeles('p2')">
                        <i class="fas fa-copy mr-2"></i>Copiar
                    </button>
                </div>
            </div>
        </div>


        <div class=" flex">
            <x-btn class="w-full">
                cerrar
            </x-btn>
        </div>

        <script>
            function copiarAlPortapapeles(id_elemento) {
                var aux = document.createElement("input");
                aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
                document.body.appendChild(aux);
                aux.select();
                document.execCommand("copy");
                document.body.removeChild(aux);
            }
        </script>
    </div>
</x-OfficeLayout>
