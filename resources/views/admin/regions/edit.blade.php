@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')
    <h1>Editar Región</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="p-3 mb-2 bg-success text-white">Se ha editado la región correctamente</div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($region, ['route' => ['admin.regions.update', $region],'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre']) !!}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Editar región', ['class' => 'btn btn-primary']) !!}
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