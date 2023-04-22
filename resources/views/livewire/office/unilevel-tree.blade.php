<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    @section('title', 'Unilevel-Tree')

    @section('css')
        <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    @endsection

    <div class=" flex justify-center bg-white h-96 rounded-lg mt-8 border border-gray-300 shadow-lg"
        style="height: 450px">
        <div class="caja">
            <div class="tree">
                <ul>
                    <li>
                        <a wire:click="subir({{ $user }})" class="cursor-pointer"><strong
                                class=" text-rojo-500 text-base">{{ $user->usuario }} </strong>
                            @if ($user->quantity)
                                <p class=" mt-2">Directos: {{ $user->quantity->direct }}
                                </p>
                                <p>Total: {{ $user->quantity->unilevel }} </p>
                            @else
                                <p class=" mt-2">Directos: 0
                                </p>
                                <p>Total: 0 </p>
                            @endif
                        </a>
                        @if (count($user->unilevels) > 0)
                            <ul>
                                @foreach ($user->unilevels as $nivel_1)
                                    <li>
                                        @php
                                            $user = user($nivel_1->direct_id);
                                        @endphp
                                        <a class="cursor-pointer" wire:click="bajar({{ $user }})"><span
                                                class=" text-rojo-500 text-base">{{ $user->usuario }}</span>
                                            @if ($user->quantity)
                                                <p>Directos: {{ $user->quantity->direct }}
                                                </p>
                                                <p>Total: {{ $user->quantity->unilevel }} </p>
                                            @else
                                                <p>Directos: 0
                                                </p>
                                                <p>Total: 0 </p>
                                            @endif
                                        </a>

                                        @if (count($user->unilevels) > 0)
                                            <ul>
                                                @foreach ($user->unilevels as $nivel_2)
                                                    <li>
                                                        @php
                                                            $user = user($nivel_2->direct_id);
                                                        @endphp
                                                        <a class=" cursor-pointer"
                                                            wire:click="bajar({{ $user }})"><span
                                                                class=" text-xs text-rojo-500">{{ $user->usuario }}</span>
                                                            @if ($user->quantity)
                                                                <p>Directos: {{ $user->quantity->direct }}
                                                                </p>
                                                                <p>Total: {{ $user->quantity->unilevel }} </p>
                                                            @else
                                                                <p>Directos: 0
                                                                </p>
                                                                <p>Total: 0 </p>
                                                            @endif
                                                        </a>

                                                        @if (count($user->unilevels) > 0)
                                                            <ul>
                                                                @foreach ($user->unilevels as $nivel_3)
                                                                    <li>
                                                                        @php
                                                                            $user = user($nivel_3->direct_id);
                                                                        @endphp
                                                                        <a class="cursor-pointer small"
                                                                            wire:click="bajar({{ $user }})">{{ $user->usuario }}</a>
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


    {{--  <div class="tree">
        <ul>
            <li>
                <a href="">{{ $user->name }}</a>
                @if (count($level_1) > 0)
                    <ul>
                        @foreach ($level_1 as $user_level_1)
                            <li>
                                <a wire:click="nuevo({{ $user_level_1 }})">{{ $user_level_1->name }}</a>

                                @if (count($user_level_1->unilevels) > 0)
                                    <ul>
                                        @foreach ($user_level_1->unilevels as $user_level_2)
                                            <li>
                                                <a href="">{{ user($user_level_2->direct_id)->name }}</a>
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
    </div> --}}
</div>

