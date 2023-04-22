<div class="">

    <div class=" flex items-center">
        <input type="checkbox" class="form-radio" required>
        <p class="ml-4  text-azul-600 font-semibold ">Estoy de acuerdo con los <a wire:click="terminos"
                class=" underline cursor-pointer text-rojo-500 hover:text-azul-500"> Términos de Afiliación</a> y el <a
                wire:click="privacidad" class=" underline cursor-pointer text-rojo-500 hover:text-azul-500"> Aviso de
                Privacidad </a>los cuales
            acepto sin reservas.</p>
    </div>

    <x-confirmation-modal wire:model="aviso_privacidad">
        <x-slot name="title">
            <h6 class="mb-2 text-lg text-gray-900 font-bold">
                Aviso de privacidad de AppPlus
            </h6>
        </x-slot>
        <x-slot name="content">
            <x-politicas-de-privacidad />
        </x-slot>
        <x-slot name="footer">
            <x-btn class="ml-2" wire:click="cerrar" wire:loading.attr="disabled">
                cerrar
            </x-btn>
        </x-slot>

    </x-confirmation-modal>

    <x-confirmation-modal wire:model="terminos_afiliacion">
        <x-slot name="title">
            <h6 class="mb-2 text-lg text-gray-900 font-bold">
                Términos de afiliación.
            </h6>
        </x-slot>

        <x-slot name="content">
            <x-terminos-y-condiciones />
        </x-slot>

        <x-slot name="footer">
            <x-btn class="ml-2" wire:click="cerrar" wire:loading.attr="disabled">
                cerrar
            </x-btn>
        </x-slot>
    </x-confirmation-modal>
    
</div>
