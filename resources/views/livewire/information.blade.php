<div>
    <a class=" cursor-pointer text-gray-200 hover:text-white hover:font-medium" wire:click="terminos"> Términos y
        condiciones</a> <br>
    <a class=" cursor-pointer text-gray-200 hover:text-white hover:font-medium" wire:click="privacidad">Politicas de
        Privacidad</a> <br>

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
