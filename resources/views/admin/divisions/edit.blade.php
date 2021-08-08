@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')
    <h1>Editar División</h1>
@stop

@section('content')
@if (session('info'))
<div class="p-3 mb-2 bg-success text-white">División creada correctamente</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($division, ['route' => ['admin.divisions.update', $division],'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre de la división']) !!}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('region_id', 'Región:') !!}
                {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}
                @error('region_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            {!! Form::submit('Crear división', ['class' => 'btn btn-primary']) !!}
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