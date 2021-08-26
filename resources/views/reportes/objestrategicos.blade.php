@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Reporte por Objetivo estrategico</h1>
@stop

@section('content')

            <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>

            <div class="card">
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
                                @if ($desviacion == 1)
                                    <div class="card-body">
                                        <strong>El objetivo seleccionado no tiene asignaciones registradas</strong>
                                    </div>
                                @else
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="py-2 text-center">{{round($real_total,2) ?? '-'}} %</td>
                                        <td class="py-2 text-center">{{round($plan_total,2) ?? '-'}} %</td>
                                        <?php 
                                            if( $desviacion >=1 && $desviacion <=9){
                                                $colord = 'orange';
                                            }else if($desviacion >=10) {
                                                $colord = 'red';
                                            }else if($desviacion <=1) {
                                                $colord = 'green';
                                            }
                                        ?>
                                        <td class="text-center font-bold" style ="color: {{$colord}}"> {{round($desviacion),2}} % </td>
                                        <td class="text-center">{{round($cumplimiento),2}} %</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>