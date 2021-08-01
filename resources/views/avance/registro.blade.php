@extends('layouts.inicio')

@section('content')
<x-authentication-card1>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('avances.update', $asignacion_id) }}">
        @csrf

        @method('PUT')

        <div>
            <x-label for="conformacion" value="{{ __('Conformación del Ent') }}" />
            <x-input id="conformacion" class="block mt-1 w-full" type="number" name="conformacion" required autofocus />
        </div>

        <div>
            <x-label for="recoliacion" value="{{ __('Recopilación de Información, desarrollo y analisis') }}" />
            <x-input id="recoliacion" class="block mt-1 w-full" type="number" name="recoliacion" required />
        </div>
        
        <div>
            <x-label for="informacion" value="{{ __('Información preliminar') }}" />
            <x-input id="informacion" class="block mt-1 w-full" type="number" name="informacion" required />
        </div>

        <div>
            <x-label for="divulgacion" value="{{ __('Divulgación y publicación') }}" />
            <x-input id="divulgacion" class="block mt-1 w-full" type="number" name="divulgacion" required />
        </div>

        <div>
            <x-label for="recomendaciones" value="{{ __('Carga de recomendaciones') }}" />
            <x-input id="recomendaciones" class="block mt-1 w-full" type="number" name="recomendaciones" required />
        </div>
       

            <x-button class="ml-4">
                {{ __('Registrar Avance') }}
            </x-button>
    </form>
</x-authentication-card1>
@endsection
