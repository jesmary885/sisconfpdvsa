@extends('adminlte::page')

@section('title', 'Sisconf')

@section('content_header')
@livewire('user-edit', ['user' => $user])

@endsection