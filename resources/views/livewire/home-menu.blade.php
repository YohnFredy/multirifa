<div class="sticky top-0 z-50">
    <div class=" bg-gradient-to-r from-azul-600 to-azul-500 h-2 w-full">
    </div>
    <nav x-data="{ open: false }" class="bg-white opacity-95 md:opacity-90 border-b border-gray-100 shadow-md">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
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
                </div>

                <div class="hidden md:flex py-2">
                    <!-- Navigation Links -->
                    <div class="flex mr-4">
                        <x-nav-link-2 href="{{ route('index') }}" :active="request()->routeIs('index')">
                            {{ __('Inicio') }}
                        </x-nav-link-2>
                    </div>

                   <div class="flex mr-4">
                        <x-nav-link-2 href="{{route('principal.opportunity')}}" :active="request()->routeIs('principal.opportunity')">
                            {{ __('Oportunidad') }}
                        </x-nav-link-2>
                    </div>
                    <div class="flex mr-4">
                        <x-nav-link-2 href="{{route('contactanos.index')}}" :active="request()->routeIs('contactanos.index')">
                            {{ __('Contactanos') }}
                        </x-nav-link-2>
                    </div>
                    <div class="flex">
                        <x-nav-link-2 href="{{route('office.index')}}" :active="request()->routeIs('office.index')">
                            {{ __('Oficina') }}
                        </x-nav-link-2> 
                    </div>
                </div>

                <!-- Teams Dropdown -->
                <div class="hidden md:flex sm:items-center">
                    @if (Route::has('login'))
                        <div class=" flex items-center">
                            @auth
                                <!-- Settings Dropdown -->
                                <div class=" relative">
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

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                    @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @else
                                <x-nav-link-2 href="{{ route('login') }}" :active="request()->routeIs('login')">
                                    {{ __('Iniciar Sesión') }}
                                </x-nav-link-2>
                            @endauth
                        </div>
                    @endif
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
                <x-responsive-nav-link-2 href="{{ route('index') }}" :active="request()->routeIs('index')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link-2>
            </div>
            <div class="pb-2 space-y-1">
                <x-responsive-nav-link-2 href="{{route('principal.opportunity')}}" :active="request()->routeIs('principal.opportunity')">
                    {{ __('Oportunidad') }}
                </x-responsive-nav-link-2>
            </div>
            <div class="pb-2 space-y-1">
                <x-responsive-nav-link-2 href="{{route('contactanos.index')}}" :active="request()->routeIs('contactanos.index')">
                    {{ __('Contactanos') }}
                </x-responsive-nav-link-2>
            </div>
            <div class="pb-2 space-y-1">
                <x-responsive-nav-link-2 href="{{route('office.index')}}" :active="request()->routeIs('office.index')">
                    {{ __('Oficina') }}
                </x-responsive-nav-link-2>
            </div> 

            <div class="pt-4 pb-1 border-t border-rojo-500">
                @if (Route::has('login'))
                    @auth
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
                    @else
                        <div class="flex items-center px-4 mb-4">
                            <!-- Authentication -->
                            <x-nav-link-2 href="{{ route('login') }}" :active="request()->routeIs('login')">
                                {{ __('Iniciar Sesión') }}
                            </x-nav-link-2>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</div>
