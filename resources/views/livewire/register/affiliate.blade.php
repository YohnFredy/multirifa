<div>
    <form autocomplete="off" wire:submit.prevent="$emit('executeCaptchaValidation')">

        <div class="grid md:grid-cols-6 mt-6 gap-x-4 gap-y-1">
            <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 type="text" wire:model.lazy="name" name="nombre" required />
                <x-label-2 for="nombre">Nombre:</x-label-2>
                @error('name')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.lazy="apellido" type="text" name="apellido" />
                <x-label-2 for="apellido">Apellido:</x-label-2>
                @error('apellido')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.lazy="cedula" type="text" name="Cedula" required />
                <x-label-2 for="cedula">Cedula:</x-label-2>
                @error('cedula')
                    <span class="error text-sm text-rojo-500 font-bold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.lazy="email" type="email" name="email" required />
                <x-label-2 for="email">Correo electrónico:</x-label-2>
                @error('email')
                    <span class="error text-sm text-rojo-500 font-bold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-2 relative z-0 mb-6 w-full group">
                <x-input-2 type="text" wire:model.lazy="usuario" name="usuario" autocomplete="off" required />
                <x-label-2 for="Usuario">Usuario: </x-label-2>
                @error('usuario')
                    <span class="error text-sm text-rojo-500 font-bold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-2 relative z-0 mb-6 w-full group">
                <x-label_select for="Sexo"> Sexo:</x-label_select>
                <div
                    class="flex 'block py-0.5 px-0 w-full text-azul-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-azul-600 peer">
                    <div class="flex items-center mr-4 py-2.5">
                        <input wire:model.defer="sexo" id="inline-radio" type="radio" value="masculino"
                            name="inline-radio-group"
                            class="w-4 h-4 text-azul-500 bg-gray-100 border-gray-300 focus:ring-azul-500  focus:ring-2">
                        <label for="inline-radio" class="ml-2 text-sm font-medium text-azul-500">M</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input wire:model.defer="sexo" id="inline-2-radio" type="radio" value="femenino"
                            name="inline-radio-group"
                            class="w-4 h-4 text-azul-500 bg-gray-100 border-gray-300 focus:ring-azul-500  focus:ring-2 ">
                        <label for="inline-2-radio" class="ml-2 text-sm font-medium text-azul-500 ">F</label>
                    </div>
                </div>
            </div>
            <div class="md:col-span-2 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.defer="f_nacimiento" type="date" name="fecha de nacimiento" />
                <x-label-2 for="fecha de nacimiento">Fecha Nacimiento:</x-label-2>
                @error('f_nacimiento')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-label_select for="country"> País:</x-label_select>
                <x-select wire:model="country_id" required>
                    <option value="" disabled selected>Seleccione un país</option>
                    @foreach ($countries as $country)
                        <option class=" text-gray-800" value="{{ $country->id }}">{{ $country->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-label_select for="departamento"> Departamento:
                </x-label_select>
                <x-select wire:model="state_id" required>
                    <option value="" disabled selected>Seleccione un departamento</option>
                    @foreach ($states as $state)
                        <option class=" text-gray-800" value="{{ $state->id }}">{{ $state->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.lazy="city" type="text" name="city" required />
                <x-label-2 for="city">Ciudad:</x-label-2>
                @error('city')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class=" md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.lazy="direccion" type="text" name="direccion" />
                <x-label-2 for="direccion">Dirección:</x-label-2>
                @error('direccion')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.lazy="telefono" type="text" name="telefono" required />
                <x-label-2 for="telefono">Teléfono:</x-label-2>
                @error('telefono')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-start-1 md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 autocomplete="new-password" wire:model.debounce.1s="password" type="password" name="password"
                    required />
                <x-label-2 for="password">Password:</x-label-2>
                @error('password')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 wire:model.debounce.1s="password_confirmation" type="password" name="confirmar password"
                    required />
                <x-label-2 for="Confirmar password">Confirmar password:</x-label-2>
                @error('password_confirmation')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 type="text" name="sponsor" value="{{ $sponsor->usuario }}" disabled />
                <x-label-2 for="sponsor">Patrocinador:</x-label-2>
                @error('sponsor')
                    <span class="error text-sm text-rojo-500 font-semibold">*{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-3 relative z-0 mb-6 w-full group">
                <x-input-2 type="text" name="side" value="{{ $side }}" disabled />
                <x-label-2 for="side">Lado:</x-label-2>
            </div>
        </div>


       @livewire('register.terminos-afiliacion')

        <x-btn class=" w-full mt-4">
            Registrar
        </x-btn>
    </form>


    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <div class=" text-2xl text-gray-700 text-center  font-bold ">
                Registro Exitoso.
            </div>
        </x-slot>

        <x-slot name="footer">
            <div>
                <x-btn wire:click="cerrar">
                    Cerrar
                </x-btn>
            </div>
        </x-slot>
    </x-dialog-modal>

    @push('js')
        <script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_CLAVE_SITIO')}}"></script>
        <script>
            Livewire.on('executeCaptchaValidation', () => {
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{env("RECAPTCHA_CLAVE_SITIO")}}' , {
                        action: 'submit'
                    }).then(function(token) {
                        @this.emitSelf('captchaResponse', token);
                    });
                });
            })
        </script>
    @endpush
</div>
