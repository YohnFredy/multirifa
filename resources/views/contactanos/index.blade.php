@section('title', 'contactanos')
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">

        <div class=" grid md:grid-cols-8 py-6">
            <div
                class="md:col-start-2 lg:col-start-3 md:col-span-6 lg:col-span-4  bg-white rounded-md px-4 py-6 shadow-lg ">

                @if (session('info'))
                    @livewire('alert')
                @endif

                <p class=" text-rojo-500 font-semibold text-center mb-2">DEJANOS UN MENSAJE</p>
                <div class=" border-b-2 border-azul-500"></div>

                <form id="demo-form" autocomplete="off" action="{{ route('contactanos.store') }}" method="post">
                    @csrf
                    <div class="grid md:grid-cols-6 mt-6 gap-x-4 gap-y-1">
                        <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                            <x-input type="text" value="{{ old('name') }}" name="name" required />
                            <x-label for="nombre">Nombre:</x-label>
                            @error('name')
                                <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                            <x-input type="mail" name="correo" value="{{ old('correo') }}" required />
                            <x-label for="correo">Correo:</x-label>
                            @error('correo')
                                <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" col-span-6 relative z-0 mb-6 w-full group">
                            <textarea name="mensaje"
                                class="block py-2.5 px-0 w-full text-azul-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-azul-500 peer"
                                placeholder="" rows="4" required>{{ old('mensaje') }}</textarea>
                            <x-label for="mensaje">Mensaje:</x-label>

                            @error('mensaje')
                                <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <x-btn class="g-recaptcha w-full mt-4" 
                    data-sitekey='{{env("RECAPTCHA_CLAVE_SITIO")}}'
                        data-callback='onSubmit' data-action='submit'>
                        Enviar
                    </x-btn>
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

</x-app-layout>
