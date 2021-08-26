<div>
     <a class="hover:bg-TrueGray-200 hover:text-red-500 cursor-pointer" wire:click="$set('open', true)">
       Cambiar contraseña
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Cambiar contraseña
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center">
                <x-label for="conformacion" value="{{ __('Contraseña anterior') }}" />
                <x-input class="flex-1" wire:model="old_password" id="old_password" class="block mt-1" type="password" name="old_password" required autofocus />
            </div>
            <div class="flex">
                <x-label class="flex-1" for="recopilacion" value="{{ __('Nueva contraseña') }}" />
                <x-input wire:model="password" class="block mt-1" type="password" name="password" required />
            </div>
            
            <div class="flex">
                <x-label class="flex-1" for="informacion" value="{{ __('Confirmar nueva contraseña') }}" />
                <x-input wire:model="password_confirmation" class="block mt-1" type="password" name="password_confirmation" id="password-confirm" required />
            </div>

            <x-input-error for="password" />
        </x-slot>

        <x-slot name=footer>

            <x-button wire:click="update_password">
                {{ __('Cambiar contraseña') }}
            </x-button>

            <x-button wire:click="close">
                {{ __('Cerrar') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>
</div>