@extends('layouts.inicio2')

@section('content')

<div class="container">
    <x-validation-errors class="mb-4" />

    <x-authentication-card-avance>

    <form method="POST" action="{{ route('asignacions.update', $asignacion) }}">
        @csrf

        @method('PUT')
        
        <div class="flex justify-between items-center">
            <x-label for="conformacion" value="{{ __('Conformación del Ent') }}" />
            <x-input class="flex-1" id="conformacion" class="block mt-1" type="number" name="conformacion" required autofocus />
        </div>

        <div class="flex">
            <x-label class="flex-1 w-full" for="recoliacion" value="{{ __('Recopilación de Información, desarrollo y analisis') }}" />
            <x-input id="recoliacion" class="block mt-1" type="number" name="recoliacion" required />
        </div>
        
        <div class="flex">
            <x-label class="flex-1 w-full" for="informacion" value="{{ __('Información preliminar') }}" />
            <x-input id="informacion" class="block mt-1" type="number" name="informacion" required />
        </div>

        <div class="flex">
            <x-label class="flex-1 w-full" for="divulgacion" value="{{ __('Divulgación y publicación') }}" />
            <x-input id="divulgacion" class="block mt-1" type="number" name="divulgacion" required />
        </div>

        <div class="flex">
            <x-label class="flex-1 w-full" for="recomendaciones" value="{{ __('Carga de recomendaciones') }}" />
            <x-input id="recomendaciones" class="block mt-1" type="number" name="recomendaciones" required />
        </div>
       
        <div class="pt-6">
            <x-button>
                {{ __('Registrar Avance') }}
            </x-button>

        </div>
            
    </form>
</x-authentication-card-avance>

</div>
   

@endsection
