@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Reporte por Objetivo estrategico</h1>
@stop

@section('content')
    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>
    <div class="card">
        <div class="card-body">
            @if ($desviacion == 1)
                <div class="card-body">
                    <strong>El objetivo seleccionado no tiene asignaciones registradas</strong>
                </div>
            @else
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
                            <td class="py-2 text-center">{{round($real_total,2) ?? '-'}} %</td>
                            <td class="py-2 text-center">{{round($plan_total,2) ?? '-'}} %</td>
                                <?php 
                                   if ($desviacion <=1) {
                                        $colord = 'green';
                                    }
                                    elseif($desviacion >=2 || $desviacion <=10){
                                        $colord = 'orange';
                                    }
                                    else {
                                        $colord = 'red';
                                    }
                                ?>
                            <td class="text-center font-bold" style ="color: {{$colord}}"> {{round($desviacion),2}} % </td>
                            <td class="text-center">{{round($cumplimiento),2}} %</td>
                        </tr>
                    </tbody>  
                </table>
                <div class="flex py-4">
                    <div class="px-4">
                        <a href="{{route('listado.objestrategico')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                    </div>
                    <div class="px-4">
                        <a href="{{url('consultas_objestrategicos/export-excel')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text-right">Exportar a excel</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>