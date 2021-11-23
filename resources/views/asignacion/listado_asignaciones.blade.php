@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Asignaciones de usuarios</h1>
@stop

@section('content')
    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> << Asignaciones de {{$usuario->name}} {{$usuario->apellido}} >></p>
    <div class="card">
        @if ($asignacions->count())
            <div class="py-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped w-full">
                            <thead>
                                <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                    <th >Fecha de creación</th>
                                    <th >Objetivo operacional</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignacions as $asignacion)
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="p-2">{{$asignacion->created_at}}</td>
                                        <td class="p-2">{{$asignacion->objoperacional->description}}</td>
                                        <td>
                                            <div>
                                                <form class="form_eliminar" action="{{route('asignacion_eliminar', ['asignacion' => $asignacion ,'usuario' => $usuario])}}" method="POST"> 
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                                {{-- <a href="{{route('asignacion_eliminar', ['asignacion' => $asignacion])}}" class="text-red-600 font-bold hover:text-red-900 form_eliminar">Eliminar</a>   --}}
                                            </div>   
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{$asignacions->links()}}
                        </div>
                    </div>
                </div>
                <div class="flex py-4">
                    <div class="px-4">
                        <a href="{{route('asignacion_listado_usuario')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                    </div>
                </div>
            </div>
        @else
            <div class="px-6 py-4">
                El usuario seleccionado no posee asignaciones registradas
            </div>

            <div class="px-4">
                <a href="{{route('asignacion_listado_usuario')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
            </div>
         @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($eliminar == 'true')

        <script>Swal.fire(
        'La asignación ha sido eliminada.')
        </script>

    @endif


    <script>
    $('.form_eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: 'Estas seguro de eliminar la asignación?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, bórralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                this.submit();
            
            }
        })
    });
    
     </script>
@stop