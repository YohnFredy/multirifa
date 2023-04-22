<x-register-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-6 my-8">
            <div
                class=" md:col-start-2  md:col-span-4 lg:col-start-3 lg:col-span-2 bg-white   rounded-md px-4 py-6 shadow-lg ">


                <div class="mb-6 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                @if (session('status'))
                    <div class="mb-6 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-6" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{--  <div class="block">
                <x-label-2 for="email" value="{{ __('Email') }}" />
                <x-input-2 id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div> --}}

                    <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                        <x-input-2 type="email" id="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" />
                        <x-label-2 for="email">Email:</x-label-2>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-btn>
                            {{ __('Email Password Reset Link') }}
                        </x-btn>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-register-layout>
