<div>
    {{-- <x-secondary-button wire:click="$set('open', true)">
       Cambiar contraseña
    </x-secondary-button> --}}

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Cambiar contraseña
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center">
                <x-label for="conformacion" value="{{ __('Contraseña anterior') }}" />
                <x-input class="flex-1" wire:model="old_pass" class="block mt-1" type="password" name="old_pass" required autofocus />
            </div>
            <div class="flex">
                <x-label class="flex-1" for="recopilacion" value="{{ __('Nueva contraseña') }}" />
                <x-input wire:model="new_pass" class="block mt-1" type="password" name="new_pass" required />
            </div>
            
            <div class="flex">
                <x-label class="flex-1" for="informacion" value="{{ __('Confirmar nueva contraseña') }}" />
                <x-input wire:model="new_pass_c" class="block mt-1" type="password" name="new_pass_c" required />
            </div>
        </x-slot>

        <x-slot name=footer>
            <x-button>
                {{ __('Cambiar contraseña') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>
</div>