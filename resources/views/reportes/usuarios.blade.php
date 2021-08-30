@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Reporte por región</h1>
@stop

@section('content')

    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>
    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> << {{$usuario->name}} {{$usuario->apellido}} >></p>
    <div class="card">
        @if ($asignacions->count())
            <div class="card-body">
                <table class="table table-striped w-full">
                    <thead>
                        <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                            <th>Avance Real</th>
                            <th>Planificado</th>
                            <th >Desviación</th>
                            <th >Cumplimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="py-2 border-collapse border border-gray-300">
                            <td class="py-2 text-center">{{round($real_usuario_d,2) ?? '-'}} %</td>
                            <td class="py-2 text-center">{{round($plan_usuario_d,2) ?? '-'}} %</td>
                            <?php 
                                if ($desviacion_usuario_d <=1) {
                                    $colord = 'green';
                                }
                                elseif($desviacion_usuario_d >=2 || $desviacion_usuario_d <=10){
                                    $colord = 'orange';
                                }
                                else {
                                    $colord = 'red';
                                }
                            ?>
                            <td class="text-center font-bold" style ="color: {{$colord}}"> {{round($desviacion_usuario_d),2}} % </td>
                            <td class="text-center">{{round($cumplimiento_usuario_d),2}} %</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="py-6">
                <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR ASIGNACIÓN</p>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped w-full">
                            <thead>
                                <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                    <th class="px-2">Objetivo operacional</th>
                                    <th class="px-2">Avance Real</th>
                                    <th class="px-2">Planificado</th>
                                    <th class="px-2">Desviación</th>
                                    <th class="px-2">Cumplimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignacions as $asignacion)
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="p-2">{{$asignacion->objoperacional->description}}</td>
                                        <td class="text-center">{{round($asignacion->avance->avance_real,2) ?? '-'}} %</td>
                                        <td class="text-center">{{round($asignacion->avance->avance_plan,2) ?? '-'}} %</td>
                                        <?php $desviacion = ($asignacion->avance->avance_plan) - ($asignacion->avance->avance_real);
                                            if ($desviacion <=1) {
                                                $colord = 'green';
                                            }
                                            elseif($desviacion >=2 && $desviacion <=10){
                                                $colord = 'orange';
                                            }
                                            else {
                                                $colord = 'red';
                                            }
                                        ?>
                                        <td class="text-center font-bold" style ="color: {{$colord}}"> {{round(($asignacion->avance->avance_plan) - ($asignacion->avance->avance_real)),2}} % </td>
                                        <td class="text-center">{{round((($asignacion->avance->avance_real) / ($asignacion->avance->avance_plan))*100),2}} %</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex py-4">
                    <div class="px-4">
                        <a href="{{route('listado.usuario')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                    </div>
                    <div class="px-4">
                        <a href="{{url('consultas_usuarios/export-excel')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text-right">Exportar a excel</a>
                    </div>
                </div>
            </div>
        @else
            <div class="px-6 py-4">
                El usuario seleccionado no posee asignaciones registradas
            </div>

            <div class="px-4">
                <a href="{{route('listado.usuario')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
            </div>
         @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop