@extends('layouts.inicio')

@section('content')

   <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex">
                <x-label class="pr-14 pt-2" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="mt-1 w-full text-gray-300" type="email" name="email" :value="old('email')" required/>
            </div>

            <div class="mt-4 flex">
                <x-label class="pr-8 pt-2" for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>
       
            <div class="pt-10 items-center w-full px-22">
                <x-button>
                    {{ __('Ingresar') }}
                </x-button>
            </div>
                
            </div>
        </form>
    </x-authentication-card>
    @endsection
 