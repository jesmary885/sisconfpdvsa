@extends('layouts.inicio2')

@section('content')
    <div class="container">
        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('consultas.buscar') }}">
            @csrf
            <div class="items-center">
                <p class="text-gray-500 text-lg font-bold">Categoría de la busqueda</p>
            </div>
            <div class="flex mt-4 items-center">
                <div>
                    <select id="categoria" class="w-52 form-control mt-4 h-8 text-m" name="categoria">
                        <option value="" selected>Seleccionar categoría</option>
                        <option value="1">Usuario</option>
                        <option value="2">Región</option>
                        <option value="3">División</option>
                        <option value="4">Negocio</option>
                        <option value="5">Obj. Estrategico</option>
                        <option value="6">Obj. Táctico</option>
                        <option value="7">Obj. Operacional</option>
                    </select>
                    <x-input-error for="negocio_id" />
                </div>
                <div class="mt-4 ml-8 flex-1 items-center">
                    <x-button>
                        {{ __('Buscar') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>
@endsection
