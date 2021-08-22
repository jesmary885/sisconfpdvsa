@extends('layouts.inicio2')

@section('content')

<form method="POST" action="{{ route('user.updatepass') }}">
    @csrf

    @method('PUT')

<div class="flex justify-between items-center">
    <x-label for="conformacion" value="{{ __('Contraseña anterior') }}" />
    <x-input class="flex-1" class="block mt-1" type="password" name="old_pass" required autofocus />
</div>
<div class="flex">
    <x-label class="flex-1" for="recopilacion" value="{{ __('Nueva contraseña') }}" />
    <x-input class="block mt-1" type="password" name="new_pass" required />
</div>

<div class="flex">
    <x-label class="flex-1" for="informacion" value="{{ __('Confirmar nueva contraseña') }}" />
    <x-input class="block mt-1" type="password" name="new_pass_c" required />
</div>
<div class="pt-6">
    <x-button>
        {{ __('Cambiar contraseña') }}
    </x-button>

</div>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop