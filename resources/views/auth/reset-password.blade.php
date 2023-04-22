<x-register-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-6 my-8">
            <div
                class=" md:col-start-2  md:col-span-4 lg:col-start-3 lg:col-span-2 bg-white   rounded-md px-4 py-6 shadow-lg ">

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                   {{--  <div class="block">
                        <x-label-2 for="email" value="{{ __('Email') }}" />
                        <x-input-2 id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    </div> --}}

                    <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                        <x-input-2 type="email" id="email" name="email" :value="old('email', $request->email)" required autofocus
                            autocomplete="username" />
                        <x-label-2 for="email">Email:</x-label-2>
                    </div>

                    {{-- <div class="mt-4">
                        <x-label-2 for="password" value="{{ __('Password') }}" />
                        <x-input-2 id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div> --}}

                    <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                        <x-input-2 type="password" id="password" name="password" required
                        autocomplete="new-password" />
                        <x-label-2 for="password">Password:</x-label-2>
                    </div>

                   {{--  <div class="mt-4">
                        <x-label-2 for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input-2 id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div> --}}

                    <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                        <x-input-2 type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                        <x-label-2 for="password_confirmation">Confirm Password:</x-label-2>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-btn>
                            {{ __('Reset Password') }}
                        </x-btn>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-register-layout>
