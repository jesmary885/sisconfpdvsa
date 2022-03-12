@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')

<a href="{{route('admin.users.create')}}" class="btn btn-primary float-right">Registrar Usuario</a>
    <h1>Lista de usuarios</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    @livewire('user-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop