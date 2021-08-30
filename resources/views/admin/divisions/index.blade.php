@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')

<a href="{{route('admin.divisions.create')}}" class="btn btn-primary float-right">Registrar división</a>

    <h1>Lista de divisiones</h1>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
@stop

@section('content')
    @livewire('division-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop