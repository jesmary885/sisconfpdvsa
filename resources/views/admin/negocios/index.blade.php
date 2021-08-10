@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')

<a href="{{route('admin.negocios.create')}}" class="btn btn-primary float-right">Registrar negocio</a>

    <h1>Lista de Negocios</h1>
@stop

@section('content')
    @livewire('negocio-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop