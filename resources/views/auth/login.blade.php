<x-register-layout>


    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-6 my-8">
            <div
                class=" md:col-start-2  md:col-span-4 lg:col-start-3 lg:col-span-2 bg-white   rounded-md px-4 py-6 shadow-lg ">

                <x-validation-errors class="mb-4" />

                <p class="  text-rojo-500 font-semibold text-center mb-2">INICIAR SESIÓN</p>

                <div class=" border-b-2 border-azul-500 mb-6"></div>


                @if (session('status'))
                    <div class="mb-6 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form id="demo-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                        <x-input-2 type="email" id="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" />
                        <x-label-2 for="email">Email:</x-label-2>

                    </div>

                    <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                        <x-input-2 type="password" id="password" name="password" required autocomplete="current-password" />
                        <x-label-2 for="password">Password:</x-label-2>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                       {{--  <x-button class="ml-4">
                            {{ __('Log in') }}
                        </x-button> --}}

                        <x-btn class="g-recaptcha ml-4" 
                        data-sitekey='{{env("RECAPTCHA_CLAVE_SITIO")}}'
                        data-callback='onSubmit' data-action='submit'>
                        {{ __('Log in') }}
                    </x-btn>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</x-register-layout>
