@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-red">Registro de Negocio</h1>
@stop

@section('content')
@if (session('info'))
        <div class="p-3 mb-2 bg-success text-white">Negocio creada correctamente</div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.negocios.store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre del negocio']) !!}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('division_id', 'Región:') !!}
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