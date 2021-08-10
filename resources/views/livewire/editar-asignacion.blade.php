<div>
    <x-secondary-button wire:click="$set('open', true)">
        Editar
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar avance
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center">
                <x-label for="conformacion" value="{{ __('Conformación del Ent') }}" />
                <x-input class="flex-1" wire:model="conformacion" class="block mt-1" type="number" name="conformacion" required autofocus />
            </div>
            <div class="flex">
                <x-label class="flex-1" for="recopilacion" value="{{ __('Recopilación de Información, desarrollo y analisis') }}" />
                <x-input wire:model="recopilacion" class="block mt-1" type="number" name="recoliacion" required />
            </div>
            
            <div class="flex">
                <x-label class="flex-1" for="informacion" value="{{ __('Información preliminar') }}" />
                <x-input wire:model="informacion" class="block mt-1" type="number" name="informacion" required />
            </div>
    
            <div class="flex">
                <x-label class="flex-1" for="divulgacion" value="{{ __('Divulgación y publicación') }}" />
                <x-input wire:model="divulgacion" class="block mt-1" type="number" name="divulgacion" required />
            </div>
    
            <div class="flex">
                <x-label class="flex-1" for="recomendaciones" value="{{ __('Carga de recomendaciones') }}" />
                <x-input wire:model="recomendaciones" class="block mt-1" type="number" name="recomendaciones" required />
            </div>
        </x-slot>

        <x-slot name=footer>
            <x-button wire:click="update">
                {{ __('Registrar Avance') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>
</div>
