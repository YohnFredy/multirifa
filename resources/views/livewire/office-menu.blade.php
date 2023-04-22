<div>
    <div class="bg-gradient-to-r from-azul-600 to-azul-500 h-2 w-full">
    </div>
    <nav x-data="{ open: false }" class="bg-white  border-b border-gray-100 shadow-md">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('index') }}">
                            <div class=" flex items-center">
                                <Strong class=" text-3xl text-azul-500">App</Strong><span
                                    class=" text-2xl text-rojo-500 font-semibold">Plus</span>

                                <i class="fas fa-chevron-right text-xl text-azul-600 ml-2"></i>
                                <i class="fas fa-chevron-right text-azul-600"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class=" hidden md:flex bg-white shadow-md mt-4 h-16 rounded-md md:px-10 lg:px-40 xl:px-72">
                    <div class=" flex py-2">
                        <div class="mr-4 flex ">
                            <x-nav-link-2 href="{{ route('office.index') }}" :active="request()->routeIs('office.index')">
                                <i class="far fa-building mr-1"></i> Inicios
                            </x-nav-link-2>
                        </div>

                        <div x-data="{ open: false }" class="flex mr-4 ">

                            <x-nav-link-2 @click="open = true" :active="request()->routeIs('tree.*')">
                                <i class="fas fa-sitemap mr-1"></i> Arbol <i class=" ml-2 fas fa-angle-down "></i>
                            </x-nav-link-2>

                            <div class=" relative" x-show="open" @click.outside="open = false">
                                <div
                                    class="absolute top-14 -ml-12 z-50 bg-gray-50 border-2 border-gray-100 rounded-md w-60 shadow-md p-4">
                                    <p class=" text-center text-azul-600 font-bold">INTERFACE</p>
                                    <div class=" border border-rojo-500 mb-2">

                                    </div>

                                    <ul class=" divide-y divide-gray-500">
                                        <li class="p-1  hover:bg-azul-500 hover:text-white w-full">
                                            <a href="{{ route('tree.binary') }}"><i
                                                    class="fas fa-network-wired mr-1"></i>Arbol Bianrio</a>
                                        </li>
                                        <li class="p-1  hover:bg-azul-500 hover:text-white">
                                            <a href="{{ route('tree.unilevel') }}"><i
                                                    class="fas fa-sitemap mr-1 "></i>Arbol Unilevel</a>
                                        </li>
                                        <li class="p-1  hover:bg-azul-500 hover:text-white">
                                            <a href="{{ route('tree.unilevel_data') }}"> <i
                                                    class="fas fa-sitemap mr-1 "></i>Red Descendiente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mr-4 flex ">
                            <x-nav-link-2 href="{{ route('office.rifa') }}" :active="request()->routeIs('office.rifa')">
                             <i class="fas fa-hands-helping mr-2"></i> Solidaria
                            </x-nav-link-2>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex sm:items-center">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class=" text-right relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-azul-500 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-azul-500 hover:text-rojo-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-azul-600 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
            <div class=" border border-gray-100 "></div>
            <div class="pt-2 pb-2 space-y-1">
                <x-responsive-nav-link-2 href="{{ route('office.index') }}" :active="request()->routeIs('office.index')">
                    <i class="far fa-building mr-1"></i> Oficina
                </x-responsive-nav-link-2>
            </div>

            <div x-data="{ open: false }" class="pb-2 space-y-1">
                <x-responsive-dropdown @click="open = true" :active="request()->routeIs('tree.*')">
                    <i class="fas fa-sitemap mr-1"></i>
                    Arbol <i class=" ml-2 fas fa-angle-down "></i>
                </x-responsive-dropdown>
                <ul class=" ml-6 divide-y divide-azul-600" x-show="open" @click.outside="open = false">
                    <li class="px-2 py-1 text-gray-600 hover:bg-azul-50 hover:text-azul-600"><a
                            href="{{ route('tree.binary') }}"><i class="fas fa-network-wired mr-1"></i>Arbol
                            Bianrio</a></li>
                    <li class="px-2 py-1 text-gray-600 hover:bg-azul-50 hover:text-azul-600"><a
                            href="{{ route('tree.unilevel') }}"><i class="fas fa-sitemap mr-1 "></i>Arbol
                            Unilevel</a></li>
                    <li class="px-2 py-1 text-gray-600 hover:bg-azul-50 hover:text-azul-600"><a
                            href="{{ route('tree.unilevel_data') }}"> <i class="fas fa-sitemap mr-1 "></i>Red
                            Descendiente</a></li>
                </ul>
            </div>



            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-rojo-500">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link-2 href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link-2>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link-2 href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link-2>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link-2 href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link-2>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link-2 href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link-2>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link-2 href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link-2>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>
