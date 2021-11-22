<div>
    <x-secondary-button wire:click="$set('open', true)">
        Actualizar
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Actualizar
        </x-slot>

        <x-slot name="content">
            <div class="flex">
                <x-label class="flex-1" for="conformacion" value="{{ __('Conformación del Ent') }}" />
                <x-input wire:model="conformacion" class="block mt-1 outline-none px-2" type="number" name="conformacion" required autofocus />
            </div>
            <x-input-error for="conformacion" />
            <div class="flex">
                <x-label class="flex-1" for="recopilacion" value="{{ __('Recopilación de Información, desarrollo y analisis') }}" />
                <x-input wire:model="recopilacion" class="block mt-1 outline-none px-2" type="number" name="recoliacion" required />
            </div>
            <x-input-error for="recopilacion" />
            
            <div class="flex">
                <x-label class="flex-1" for="informacion" value="{{ __('Información preliminar') }}" />
                <x-input wire:model="informacion" class="block mt-1 outline-none px-2" type="number" name="informacion" required />
            </div>
            <x-input-error for="informacion" />
    
            <div class="flex">
                <x-label class="flex-1" for="divulgacion" value="{{ __('Divulgación y publicación') }}" />
                <x-input wire:model="divulgacion" class="block mt-1 outline-none px-2" type="number" name="divulgacion" required />
            </div>
            <x-input-error for="divulgacion" />
    
            <div class="flex">
                <x-label class="flex-1" for="recomendaciones" value="{{ __('Carga de recomendaciones') }}" />
                <x-input wire:model="recomendaciones" class="block mt-1 outline-none px-2" type="number" name="recomendaciones" required />
            </div>
            <x-input-error for="recomendaciones" />

            <div class="flex">
                <x-label class="flex-1 mt-4" for="observaciones" value="{{ __('Observaciones') }}" />
                <textarea wire:model="observaciones" class="resize-none border rounded-md mt-2 p-2 ml-4 outline-none" name="observaciones" cols="60" rows="3" required></textarea>
            </div>
            <x-input-error for="observaciones" />
        </x-slot>

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quae, natus delectus laudantium fuga quia quidem omnis minima accusantium facilis quas officiis facere autem doloremque officia ea! Cumque, unde odit?

        <x-slot name=footer>
            <x-button wire:click="update">
                {{ __('Registrar Avance') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>
</div>
