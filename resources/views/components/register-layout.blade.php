<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--  <script src="https://www.google.com/recaptcha/api.js?render=6LeV-zojAAAAAGN0udi35zzF_c3X2UzfAkUQPK69"></script>
    <script>
        document.addEventListener('submit', function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LeV-zojAAAAAGN0udi35zzF_c3X2UzfAkUQPK69', {
                    action: 'submit'
                }).then(function(token) {
                    let form = e.target;
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;
                    form.appendChild(input);
                    form.submit();
                });
            });
        });
    </script> --}}

    @yield('css')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-50">

        <div class="sticky top-0 z-50">
            <div class="bg-gradient-to-r from-azul-600 to-azul-500 h-2 w-full">
            </div>
            <div class=" bg-white bg-opacity-75  shadow-md">
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
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center text-azul-600">
                                <i class="fas fa-door-open mr-2"></i>
                                <p>BIENVENIDO(A) </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Page Content -->

        <main>
            {{ $slot }}
        </main>

    </div>

    @stack('modals')
   
    @livewireScripts

    @stack('js')
</body>

</html>
