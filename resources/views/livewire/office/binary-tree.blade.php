<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
    @section('title', 'Binary-Tree')

    @section('css')
        <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    @endsection


    <div class=" flex justify-center bg-white rounded-lg shadow-lg mt-8 " style="height: 430px;">
        <div class="caja pb-10 ">
            <div class="tree  ">
                <ul>
                    <li>
                        <a wire:click="subir({{ $user }})" class=" cursor-pointer"> <strong
                                class=" text-rojo-500 text-base">{{ $user->usuario }}</strong>
                            <div class=" grid grid-cols-2 divide-x divide-gray-600 mt-2">
                                <div class=" text-center px-2">
                                    <p class=" text-azul-600">Izquierda.</p>
                                    @if ($user->quantity)
                                        <p> User: {{ $user->quantity->left }}</p>
                                    @else
                                        <p>User: 0</p>
                                    @endif

                                    @if ($point)
                                        <p> Pts: {{ $point->pts_left }}</p>
                                    @endif
                                </div>

                                <div class="text-center px-2">
                                    <p class=" text-azul-600"> Derecha.</p>
                                    @if ($user->quantity)
                                        <p>User: {{ $user->quantity->right }}</p>
                                    @else
                                        <p>User: 0</p>
                                    @endif

                                    @if ($point)
                                        <p>Pts: {{ $point->pts_right }}</p>
                                    @endif

                                </div>

                            </div>
                        </a>



                        @if (count($user->binaries) > 0)
                            <ul>
                                @foreach ($user->binaries()->orderBy('side')->get() as $nivel_1)
                                    <li>
                                        @php
                                            $user = user($nivel_1->direct_id);
                                        @endphp

                                        <a class=" cursor-pointer" wire:click="bajar({{ $user }})"><strong
                                                class="text-rojo-500 text-base">{{ $user->usuario }}</strong>

                                            <div class=" grid grid-cols-2 divide-x divide-gray-600 mt-2">
                                                <div class=" text-center px-2">
                                                    <p class=" text-azul-600">Izquierda.</p>
                                                    @if ($user->quantity)
                                                        <p> User: {{ $user->quantity->left }}</p>
                                                    @else
                                                        <p>User: 0</p>
                                                    @endif
                                                </div>

                                                <div class="text-center px-2">
                                                    <p class=" text-azul-600"> Derecha.</p>
                                                    @if ($user->quantity)
                                                        <p>User: {{ $user->quantity->right }}</p>
                                                    @else
                                                        <p>User: 0</p>
                                                    @endif
                                                </div>

                                            </div>
                                        </a>

                                        @if (count($user->binaries) > 0)
                                            <ul>
                                                @foreach ($user->binaries()->orderBy('side')->get() as $nivel_2)
                                                    <li>
                                                        @php
                                                            $user = user($nivel_2->direct_id);
                                                        @endphp
                                                        <a class=" cursor-pointer"
                                                            wire:click="bajar({{ $user }})">{{ $user->usuario }}
                                                        </a>

                                                        @if (count($user->binaries) > 0)
                                                            <ul>
                                                                @foreach ($user->binaries()->orderBy('side')->get() as $nivel_3)
                                                                    <li>
                                                                        @php
                                                                            $user = user($nivel_3->direct_id);
                                                                        @endphp
                                                                        <a class="cursor-pointer small"
                                                                            wire:click="bajar({{ $user }})">
                                                                        {{ $user->usuario }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

