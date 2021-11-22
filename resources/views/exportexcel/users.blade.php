<p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>
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
                <td class="py-2 text-center">{{$reporte->reporte_real}} %</td>
                <td class="py-2 text-center">{{$reporte->reporte_plan}} %</td>
                <td class="text-center font-bold"> {{$reporte->reporte_desviacion}} % </td>
                <td class="text-center">{{$reporte->reporte_cumplimiento}} %</td>
            </tr>
        </tbody>
    </table>

    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR ASIGNACIÓN</p>
    <table class="table table-striped w-full">
        <thead>
            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                <th>Objetivo operacional</th>
                <th>Avance Real</th>
                <th>Planificado</th>
                <th>Desviación</th>
                <th>Cumplimiento</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asignacions as $asignacion)
                <tr class="py-2 border-collapse border border-gray-300">
                    <td class="py-4 pr-4 pl-6">{{$asignacion->objoperacional->description}}</td>
                    <td class="py-2 pl-4">{{round($asignacion->avance->avance_real,2) ?? '-'}} %</td>
                    <td class="py-2 pl-8">{{round($asignacion->avance->avance_plan,2) ?? '-'}} %</td>
                    <?php 
                    $desviacion = ($asignacion->avance->avance_plan) - ($asignacion->avance->avance_real);
                    $cumplimiento = (($asignacion->avance->avance_real) / ($asignacion->avance->avance_plan)) *100;
                    if($desviacion > 100){
                        $desviacion = 100;
                    }
                    if($cumplimiento > 100){
                        $cumplimiento = 100;
                    }
                    ?>                     
                    <td class="py-2 pl-8 font-bold"> {{round($desviacion),2}} % </td>
                    <td class="py-2 pl-8">{{round($cumplimiento),2}} %</td>
                    <td class="py-2 pl-8">{{$asignacion->avance->avance_observaciones}}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>