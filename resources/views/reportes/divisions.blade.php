@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Reporte por División</h1>
@stop

@section('content')
    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>
    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> << DIVISIÓN {{$division->name}} >></p>

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
                                    if ($desviacion_r <=1) {
                                        $colord = 'green';
                                    }
                                    elseif($desviacion_r >=2 && $desviacion_r <=10){
                                        $colord = 'orange';
                                    }
                                    else {
                                        $colord = 'red';
                                        if ($desviacion_r > 100){
                                                $desviacion_r = 100;
                                        }
                                    }
                                    if ($cumplimiento_r > 100){
                                                $cumplimiento_r = 100;
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
                                    @foreach ($negociospaginate as $negocio)
                                        <tr class="py-2 border-collapse border border-gray-300">
                                            <td class="py-2 text-center">{{$negocio->name}}</td>
                                            <td class="text-center">{{round($negocio->reportenegocio->real,2) ?? '-'}} %</td>
                                            <td class="text-center">{{round($negocio->reportenegocio->plan,2) ?? '-'}} %</td>
                                            <?php 
                                                if($negocio->reportenegocio->plan == '0'){
                                                    $desviacion_d = 0;
                                                    $cumplimiento_d = 0;
                                                    $colord_d = 'green';
                                                }
                                                else{
                                                    $desviacion_d = ($negocio->reportenegocio->plan) - ($negocio->reportenegocio->real);
                                                    $cumplimiento_d = (($negocio->reportenegocio->real) / ($negocio->reportenegocio->plan)) * 100;
                                                    if ($desviacion_d <=1) {
                                                            $colord_d = 'green';
                                                    }
                                                    elseif($desviacion_d >=2 && $desviacion_d <=10){
                                                        $colord_d = 'orange';
                                                    }
                                                    else {
                                                        $colord_d = 'red';
                                                        if ($desviacion_d > 100){
                                                                $desviacion_d = 100;
                                                        }
                                                    }

                                                    if ($cumplimiento_d > 100){
                                                    $cumplimiento_d = 100;
                                                    }
                                                }
                                            ?>
                                            <td class="text-center font-bold" style ="color: {{$colord_d}}">{{round($desviacion_d,2) ?? '-'}} %</td>
                                            <td class="text-center">{{round($cumplimiento_d,2) ?? '-'}} %</td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>

                            <div class="mt-4">
                                {{$negociospaginate->links()}}
                            </div>
                        </div>

                        <figure class="highcharts-figure pt-4">
                            <div id="container"></div>
                        </figure>
                    
                        <div class="flex py-4">
                            <div class="px-4">
                                <a href="{{route('listado.division')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                            </div>
                            <div class="px-4">
                                <a href="{{url('consultas_divisiones/export-excel')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text-right">Exportar a excel</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="px-6 py-4">
                No hay negocios registradas con la división seleccionada
            </div>  
            <div class="px-4">
                <a href="{{route('listado.division')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
            </div>
        @endif
    </div>

    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
        }
      
        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
        </style>

                <script>
                    // Create the chart
                Highcharts.chart('container', {
                  chart: {
                    type: 'column'
                  },
                  title: {
                    text: 'Porcentaje del cumplimiento real por División'
                  },
                  subtitle: {
                    text: ''
                  },
                  accessibility: {
                    announceNewData: {
                      enabled: true
                    }
                  },
                  xAxis: {
                    type: 'category'
                  },
                  yAxis: {
                    title: {
                      text: 'Porcentaje total'
                    }
                  },
                  legend: {
                    enabled: false
                  },
                  plotOptions: {
                    series: {
                      borderWidth: 0,
                      dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                      }
                    }
                  },
                  tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                  },
                  series: [
                    {
                      name: "Negocio",
                      colorByPoint: true,
                      data: <?= $data ?> 
                    }
                  ],
                });
                </script>
            @endsection