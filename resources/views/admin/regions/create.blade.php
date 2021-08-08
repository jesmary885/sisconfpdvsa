@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-red">Registro de Región</h1>
@stop

@section('content')
@if (session('info'))
        <div class="p-3 mb-2 bg-success text-white">Region creada correctamente</div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.regions.store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre de la región']) !!}
                    
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
              
                </div>

                {!! Form::submit('Crear región', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


