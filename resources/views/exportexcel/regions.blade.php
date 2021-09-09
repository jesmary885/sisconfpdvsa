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

    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR DIVISIÓN</p>
    <table class="table table-striped w-full">
        <thead>
            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                <th>División</th>
                <th>Avance Real</th>
                <th>Planificado</th>
                <th >Desviación</th>
                <th >Cumplimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisions as $division)
                <tr class="py-2 border-collapse border border-gray-300">
                    <td class="py-2 text-center">{{$division->name}}</td>
                    <td class="text-center">{{round($division->reportedivision->real,2)}} %</td>
                    <td class="text-center">{{round($division->reportedivision->plan,2)}} %</td>
                    <?php 
                        $desviacion_d = ($division->reportedivision->plan) - ($division->reportedivision->real);
                        $cumplimiento_d = (($division->reportedivision->real) / ($division->reportedivision->plan)) * 100;
                        if($desviacion_d > 100){
                            $desviacion_d = 100;
                        }
                        if($cumplimiento_d > 100){
                            $cumplimiento_d = 100;
                        }
                    ?>
                    <td class="text-center font-bold">{{round($desviacion_d,2)}} %</td>
                    <td class="text-center">{{round($cumplimiento_d,2)}} %</td>
                </tr>
            @endforeach 
        </tbody>
    </table>