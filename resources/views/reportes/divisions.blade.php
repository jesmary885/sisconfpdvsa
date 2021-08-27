@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Reporte por División</h1>
@stop

@section('content')

            <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>

            <div class="card">
                @if ($negocios->count())
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
                                @if ($desviacion_r == 1)
                                    <div class="card-body">
                                        <strong>La división seleccionada no tiene asignaciones registradas</strong>
                                    </div>
                                @else
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="py-2 text-center">{{round($real_total_r,2) ?? '-'}} %</td>
                                        <td class="py-2 text-center">{{round($plan_total_r,2) ?? '-'}} %</td>
                                        <?php 
                                            if( $desviacion_r >=1 && $desviacion_r <=9){
                                                $colord = 'orange';
                                            }else if($desviacion_r >=10) {
                                                $colord = 'red';
                                            }else if($desviacion_r <=1) {
                                                $colord = 'green';
                                            }
                                        ?>
                                        <td class="text-center font-bold" style ="color: {{$colord}}"> {{round($desviacion_r),2}} % </td>
                                        <td class="text-center">{{round($cumplimiento_r),2}} %</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="py-6">
                        <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR NEGOCIOS</p>
                        @if ($reportegeneral == '1')
                            <div class="card-body">
                                <strong>La división seleccionada no tiene asignaciones registradas</strong>
                            </div>
                            <div class="p-4">
                                <a href="{{route('listado.division')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                            </div>
                         @else
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped w-full">
                                        <thead>
                                            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                                <th>Negocio</th>
                                                <th>Avance Real</th>
                                                <th>Planificado</th>
                                                <th >Desviación</th>
                                                <th >Cumplimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($negocios as $negocio)
                                                <tr class="py-2 border-collapse border border-gray-300">
                                                    <td class="py-2 text-center">{{$negocio->name}}</td>
                                                    <td class="text-center">{{round($negocio->reportenegocio->real,2) ?? '-'}} %</td>
                                                    <td class="text-center">{{round($negocio->reportenegocio->plan,2) ?? '-'}} %</td>
                                                    <?php 
                                                        if($negocio->reportenegocio->plan == '0'){
                                                            $desviacion_d = 0;
                                                            $cumplimiento_d = 0;
                                                        }
                                                        else{
                                                            $desviacion_d = ($negocio->reportenegocio->plan) - ($negocio->reportenegocio->real);
                                                            $cumplimiento_d = (($negocio->reportenegocio->real) / ($negocio->reportenegocio->plan)) * 100;
                                                            if( $desviacion_d >=1 && $desviacion_d <=9){
                                                                $colord_d = 'orange';
                                                            }else if($desviacion_d >=10) {
                                                                $colord_d = 'red';
                                                            }else if($desviacion_d <=1) {
                                                                $colord_d = 'green';
                                                            }
                                                        }
                                                    ?>
                                                    <td class="text-center font-bold" style ="color: {{$colord_d}}">{{round($desviacion_d,2) ?? '-'}} %</td>
                                                    <td class="text-center">{{round($cumplimiento_d,2) ?? '-'}} %</td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="flex py-4">

                                <div class="px-4">
                                    <a href="{{route('listado.division')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                                </div>

                                <div class="px-4">
                                    <a href="{{url('consultas_divisiones/export-excel')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text-right">Exportar a excel</a>
                                </div>

                            </div>


                        @endif
                    </div>
                @else
                    <div class="px-6 py-4">
                        No hay negocios registradas con la división seleccionada
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