@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')

<a href="{{route('admin.regions.create')}}" class="btn btn-primary float-right">Registrar Región</a>

    <h1>Lista de regiones</h1>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
@stop

@section('content')
    @livewire('region-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop