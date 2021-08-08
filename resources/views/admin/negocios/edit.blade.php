@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')
    <h1>Editar Negocio</h1>
@stop

@section('content')
@if (session('info'))
<div class="p-3 mb-2 bg-success text-white">Negocio creado correctamente</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($division, ['route' => ['admin.negocios.update', $division],'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre del negocio']) !!}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('division_id', 'División:') !!}
                {!! Form::select('division_id', $regions, null, ['class' => 'form-control']) !!}
                @error('division_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            {!! Form::submit('Crear negocio', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop